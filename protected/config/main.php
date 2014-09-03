<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('localhost','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'my'=>array( 'class'=>"my",),
		'notify'=>array( 'class'=>"notify",),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=> include("routes.php")
		),
		
		
		// uncomment the following to use a MySQL database
		
		'db'=>include("db.php"),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		// 'log'=>array(
  //           'class'=>'CLogRouter',
  //           'routes'=>array(
  //               array(
  //                   'class'=>'CFileLogRoute',
  //                   'levels'=>'error, warning',
  //               ),
		// 		array(
  //                   'class'=>'CProfileLogRoute',
  //               ),
  //               array(
  //                   'class'=>'CWebLogRoute',
  //                   'levels'=>'error, warning, profile, info',
  //                   'enabled'=>true,
  //               ),
  //           ),
  //       ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);