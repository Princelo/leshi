<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/uc.php';

class uc_collectModule extends ShopBaseModule
{
	public function index()
	{
		
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
		$result = get_collect_list($limit,$GLOBALS['user_info']['id']);
		
		$GLOBALS['tmpl']->assign("list",$result['list']);
		$page = new Page($result['count'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_COLLECT']);
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_collect_index.html");
	
				
		$GLOBALS['tmpl']->display("uc.html");
	}
	
	public function del()
	{
		$id = intval($_REQUEST['id']);
		$GLOBALS['db']->query("delete from ".DB_PREFIX."deal_collect where id = ".$id." and user_id = ".intval($GLOBALS['user_info']['id']));
		if($GLOBALS['db']->affected_rows())
		{
			showSuccess($GLOBALS['lang']['DELETE_SUCCESS']);
		}
		else
		{
			showErr($GLOBALS['lang']['INVALID_COLLECT']);
		}
	}
	
	
}
?>