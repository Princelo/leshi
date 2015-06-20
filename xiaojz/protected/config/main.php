<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'小金钟',

        //设置系统默认控制器
        'defaultController'=>'index',
    
	// preloading 'log' component
	'preload'=>array('log'),

        //配置主题theme
        //'theme'=>'shengdan',
    
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'xiaojzgii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
            
                //引入我们创建的后台模块houtai
                'administrator',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                    'loginUrl'=>'./index.php?r=user/login',
		),
                'cache'=>array(
                    'class'=>'system.caching.CFileCache',
                ),
            
		// uncomment the following to enable URLs in path-format
//		'urlManager'=>array(
//                    'urlFormat'=>'path',
//                    'rules'=>array(
//                        //user/login.html ===> user/login
//                        'user/login'=>array('user/login','urlSuffix'=>'.html'),
//                        
//                        //user/register.html  ===>  user/register
//                        'user/register'=>array('user/register','urlSuffix'=>'.html'),
//                        
//                        //players/20   ====>  players/detail&id=20
//                        'players/<id:\d+>' => 'players/detail',
//                        
//                        //players/20/zhangsan  ===> players/category&id=20&name=zhangsan
//                        'players/<id:\d+>/<name:[a-z]+>'=>'players/category',
//                        
//                        //players/4-2-3-5.html  ===> players/category&brand=4&price2&color=3&screen=5
//                        'players/<brand:\d+>-<price:\d+>-<color:\d+>-<screen:\d+>'=>array('players/category','urlSuffix'=>'.html'),
//                    ),
//		),
            
            
            
            
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=xiaojz',
                    'emulatePrepare' => true,
                    'username' => 'xiaojz',
                    'password' => 'xiaojzxiaojz',
                    'charset' => 'utf8',
                    
                    //显示每个sql语句与运行的时间
                    'enableProfiling'=>true,

                    //把数据表的前缀设置好
                    'tablePrefix'=>'xiaojz_',
                    'enableParamLogging'=>true,
		),
        'db2'=>array(
                    'class'            => 'CDbConnection' ,
                    'connectionString' => 'mysql:host=localhost;dbname=xiaojz',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'sise',
                    'charset' => 'utf8',
        ),
		
//                'cache'=>array(
//                    'class'=>'system.caching.CFileCache',
//                ),
            
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),
			),
        ),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'lamkimcheung@qq.com',
	),
);
