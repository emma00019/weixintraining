<?php

class QRCodeController extends Controller
{
	public $layout='//layouts/login';
		/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionIndex()
	{
		$this->render('index');
	}
}