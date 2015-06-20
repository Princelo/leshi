<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yiiframework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//protected/config/constants.php defines some constants like SITE_URL, CSS_URL, etc.
require_once(dirname(__FILE__).'/protected/config/constants.php');

require_once($yii);
Yii::createWebApplication($config)->run();
