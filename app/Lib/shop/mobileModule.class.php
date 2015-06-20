<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

class mobileModule extends ShopBaseModule
{
	public function index()
	{
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('mobile_index.html', $cache_id))	
		{		
			
			
			$site_nav[] = array('name'=>$GLOBALS['lang']['HOME_PAGE'],'url'=>APP_ROOT."/");
			$site_nav[] = array('name'=>"手机客户端下载",'url'=>url("shop","mobile"));
			$GLOBALS['tmpl']->assign("site_nav",$site_nav);
			//输出当前的site_nav
			
			
			$GLOBALS['tmpl']->assign("page_title","手机客户端下载");
			$GLOBALS['tmpl']->assign("page_keyword","手机客户端下载");
			$GLOBALS['tmpl']->assign("page_description","手机客户端下载");
		}
		$GLOBALS['tmpl']->display("mobile_index.html",$cache_id);
	}
	
	public function download()
	{
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME);		
		if (!$GLOBALS['tmpl']->is_cached('mobile_download.html', $cache_id))	
		{		
			$GLOBALS['tmpl']->assign("APPLE_PATH",app_conf("APPLE_PATH"));
			$GLOBALS['tmpl']->assign("ANDROID_PATH",app_conf("ANDROID_PATH"));
			$GLOBALS['tmpl']->assign("QRCODE_SIZE",app_conf("QRCODE_SIZE"));
		}
		$GLOBALS['tmpl']->display("mobile_download.html",$cache_id);
	}
}
?>