<?php
class MenuController extends Controller
{
	public $layout='//layouts/column2';

	public function beforeAction($action)
	{
	    if(Yii::app()->user->isGuest&&$action->getId()!='login')
	    {
	        $this->redirect('/index.php?r=site/login');
	    }

	    return parent::beforeAction($action);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$models=new Menu('search');
	  	$this->render('index',array(
			'models'=>$models
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function loadModel($id)
	{
		$model=Follower::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionCreate()
	{
		//name, tag, parent_id
		$name= $_REQUEST['menuName'];
		$id = $_REQUEST['edit_id'];
		$parent_id = $_REQUEST['parent_id'];
		$flag = 0;

		$transaction= Yii::app()->db->beginTransaction();//创建事务
        try {
				if ($id == 0)
				{
					$model=new Menu();
					if ($parent_id == 0)
					{
						$model->tag = 1;
						$model->parent_id = 0;
						$model->sub_count = 0;
					}
					else
					{
						$model->tag = 0;
						$model->parent_id = $parent_id;
						$model->sub_count = 0;
						$flag = 1;
					}
				}
				else
				{
					$model = Menu::model()->findByPk($id);
				}

				$model->name=$name;
				$model->save();

				if ($flag == 1)
				{
					$parentModel = Menu::model()->findByPk($parent_id);
					$parentModel->sub_count++;
					$parentModel->save();
		    	}
				$transaction->commit();//提交事务
        } catch (Exception $e)
        {
        	$transaction->rollback();//回滚事务
        }

	  	$this->render('index');
	}

	public function actionDelete()
	{
		$id= $_REQUEST['id'];
		$models=new Menu('search');

		$transaction= Yii::app()->db->beginTransaction();//创建事务
		try {
	    		$model = Menu::model()->findByPk($id);
				if ($model['tag'] == 0) //This menu is sub menu.
				{
					$parentModel = Menu::model()->findByPk($model->parent_id);
					$parentModel->sub_count --;
					$parentModel->save();
				}
				else
				{
					foreach ($models->findAll() as $m) //Delete all sub menu that under this menu.
					{
						if($m['parent_id'] == $id)
						{
							Menu::model()->findByPk($m['id'])->delete();
						}
					}
				}
				$model->delete();
				$transaction->commit();//提交事务

		} catch (Exception $e) {
			$transaction->rollback();//回滚事务
		}

	  	$this->render('index');
	}

	public function actionApplyToWX()
	{
		$models=new Menu('search');
		$model = new GetToken();
		$createMenuUrl = Yii::app()->params['createMenuUrl'].$model->getTokenFromCache();

	  	$this->render('applyToWX',array(
		'models'=>$models,
		'url'=>$createMenuUrl
		));
	}
}
