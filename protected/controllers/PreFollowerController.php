<?php

class PreFollowerController extends Controller
{
	public $layout='//layouts/column2';

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

	public function actionReceive()
	{
        $menu = new Menu();
 		echo "123";
 		echo "<br/>";
        echo $menu->getTokenFromWechat();
        echo "<br/>";
        echo "789";
        echo "<br/>";
		//Receive the xml data
		$fileContent = file_get_contents("php://input");
		echo $fileContent;die;

		//change xml to simple xml object
		$xmlResult = simplexml_load_string($fileContent);
		//foreach every item
		foreach ($xmlResult->children() as $childItem) {
			echo $childItem->getName() . "->".$childItem;
			echo "<br/>";
		}

		$this->render('receive',array(
			'xmlResult'=>$xmlResult
		));
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$model=new Follower('search');
/*		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Follower']))
			$model->attributes=$_GET['Follower'];*/

		$menuModel=new Menu('search');
/*		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];*/

		$this->render('index',array(
			'model'=>$model,
			'menuModel'=>$menuModel,
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

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
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
		$model=new Follower;
        //print_r("begin create");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Follower']))
		{
			$model->attributes=$_POST['Follower'];
			//var_dump("begin save");
			if($model->save())
			{
				//var_dump("save");
				$this->redirect(array('view','id'=>$model->id));
			}
			//var_dump("end save");
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}
