<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

//用于优惠券部分的初始化
require_once 'app_init.php';
require_once 'youhui_lib.php';
$IMG_APP_ROOT = APP_ROOT;
define("APP_INDEX","youhui");
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_caches/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_caches/',0777);
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/')) 
	mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/',0777);
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/mobile_tpl_caches/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/mobile_tpl_caches/',0777);
if(!file_exists(APP_ROOT_PATH.'public/runtime/app/mobile_tpl_compiled/'))
	mkdir(APP_ROOT_PATH.'public/runtime/app/mobile_tpl_compiled/',0777);
if(is_mobile() === false) {
    $GLOBALS['tmpl']->cache_dir      = APP_ROOT_PATH . 'public/runtime/app/tpl_caches';
    $GLOBALS['tmpl']->compile_dir    = APP_ROOT_PATH . 'public/runtime/app/tpl_compiled';
} else {
    $GLOBALS['tmpl']->cache_dir      = APP_ROOT_PATH . 'public/runtime/app/mobile_tpl_caches';
    $GLOBALS['tmpl']->compile_dir    = APP_ROOT_PATH . 'public/runtime/app/mobile_tpl_compiled';
}
$GLOBALS['tmpl']->template_dir   = APP_ROOT_PATH . 'app/Tpl/' . app_conf("TEMPLATE");
$GLOBALS['tmpl']->assign("TMPL_REAL",APP_ROOT_PATH."app/Tpl/".app_conf("TEMPLATE")); 
//定义当前语言包
$GLOBALS['tmpl']->assign("LANG",$lang);
//定义模板路径
$tmpl_path = get_domain().APP_ROOT."/app/Tpl/";
$GLOBALS['tmpl']->assign("TMPL",$tmpl_path.app_conf("TEMPLATE"));
$GLOBALS['tmpl']->assign("APP_INDEX",APP_INDEX);

if(app_conf("SHOP_OPEN")==0)
{
	$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['SHOP_CLOSE']);
	$GLOBALS['tmpl']->assign("html",app_conf("SHOP_CLOSE_HTML"));
	$GLOBALS['tmpl']->display("shop_close.html");
	exit;
}
?>