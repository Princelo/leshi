<?php 
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------\
error_reporting(0);
if(!defined('APP_ROOT_PATH')) 
define('APP_ROOT_PATH', str_replace('verify.php', '', str_replace('\\', '/', __FILE__)));
require APP_ROOT_PATH."system/utils/es_session.php";
es_session::start();
require APP_ROOT_PATH."system/utils/es_image.php";
es_image::buildImageVerify(4,1);
?>