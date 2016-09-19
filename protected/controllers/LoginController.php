<?php

class LoginController extends Controller
{
	public $layout='//layouts/login';
		/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionIndex()
	{
		if (isset($_GET['code']))
		{
		    $code = $_GET['code'];
		    $model = new GetToken();
		    $json = $model->getWebAuthorizationToken($code);
		    $decodeWebAuthorizationToken = json_decode($json,true);
		    $access_token = $decodeWebAuthorizationToken['access_token'];
		    $openid = $decodeWebAuthorizationToken['openid'];

		    $userInfoJson = $model->getUserInfoThroughWebAuthorization($access_token,$openid);
		    // print_r($userInfoJson);die;
			$model = User::model()->find('openid=:openid',
				array(':openid'=>$openid));

			if ($model == null)
			{
				$this->render('index',array(
				'openid'=>$openid
				));
			}
			else
			{

				$this->render('showFollowerInfo',array(
					'username'=>$model->username,
					'password'=>$model->password
					));
			}
		}
		else
		{
			$this->redirect(Yii::app()->params['getCodeUrl']
	    	.Yii::app()->params['appid']."&redirect_uri=".
	    	urlencode(Yii::app()->params['redirect_Url']).
	    	Yii::app()->params['getCodeParams']);
		}

	}

	public function actionshowFollowerInfo()
	{
		$openid = Yii::app()->request->getParam('openid');
		$username = Yii::app()->request->getParam('username');
		$password = Yii::app()->request->getParam('password');

        $model = User::model()->findBySql("select * from tbl_user
        	where openid=:openid",array(':openid'=>$openid));

        if ($model == null)
        {
	        $model = User::model()->findBySql("select * from tbl_user
	        	where username=:username",array(':username'=>$username));

		    if($model == null)
		    {
				$this->render('index',array(
				'msg'=>'用户名或密码错误!',
				'openid'=>$openid
				));
		    }
		    else if($model->password != $password)
		    {
				$this->render('index',array(
				'msg'=>'用户名或密码错误!',
				'openid'=>$openid
				));
		    }
		    else if($model->openid != '0')
		    {
				$this->render('index',array(
				'msg'=>'该账号已被绑定,请输入其他账号!!',
				'openid'=>$openid
				));
		    }
		    else
		    {
				$model->openid = $openid;
				$model->save();

				$this->render('showFollowerInfo',array(
				'username'=>$username,
				'password'=>$password
				));
		    }
        }
        else
        {
			$this->render('showFollowerInfo',array(
			'username'=>$username,
			'password'=>$password
			));
        }

	}
}
