<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

class cityModule extends ShopBaseModule
{
	public function index()
	{	
		$GLOBALS['tmpl']->caching = true;
		$cache_id  = md5(MODULE_NAME.ACTION_NAME.$GLOBALS['deal_city']['id']);		
		if (!$GLOBALS['tmpl']->is_cached('city_index.html', $cache_id))	
		{		
			
		}
		
		$GLOBALS['tmpl']->display("city_index.html",$cache_id);
	}	
	public function all()
	{
		$city_name = trim(addslashes($_REQUEST['city'])); 
		if($city_name)
		{
			$deal_city = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_city where uname='' and is_effect = 1 and is_delete = 0");
		}
		if(!$deal_city)
		$deal_city = get_current_deal_city();
		es_cookie::set("deal_city",$deal_city['id']);
		app_redirect(url("index"));
	}
}
?>