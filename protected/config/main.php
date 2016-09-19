<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'wechat',
	//'defaultController'=>'Follower',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'abc123_',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'cache'=>array( 'class'=>'CFileCache'),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'createMenuUrl'=>'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=',
		'getTokenUrl'=>'https://api.weixin.qq.com/cgi-bin/token',
		'grant_type'=>'client_credential',
		'appid'=>'wx05e9cf7c058d8a6a',
		'secret'=>'a7517ff4dac4d42d9ffc6cdedf17f06e',
		'getFollowerListUrl'=>'https://api.weixin.qq.com/cgi-bin/user/get',
		'getFollowerInforUrl'=>'https://api.weixin.qq.com/cgi-bin/user/info',
		'lang' => 'zh_CN',
		'getQRCodeUrl' => 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=',
		'showQRCodeUrl' => 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=',
		'WebAuthorizationTokenUrl' =>'https://api.weixin.qq.com/sns/oauth2/access_token',
		'refreshWebTokenUrl'=>'https://api.weixin.qq.com/sns/oauth2/refresh_token',
		'verifyWebTokenUrl' => 'https://api.weixin.qq.com/sns/auth',
		'getCodeUrl'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=',
		'redirect_Url'=>'http://192.168.222.235/index.php?r=Login/index',
		'getCodeParams'=>'&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect',
		'sceneIdStart' => '10000',
		'getUserInfoThroughWebAuthorizationUrl'=>'https://api.weixin.qq.com/sns/userinfo'
	),
);
