<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require_once APP_ROOT_PATH.'app/Lib/page.php';
class mobile_eventModule extends YouhuiBaseModule
{
    public function index()
    {
        $city_id = intval($GLOBALS['deal_city']['id']);
        $area_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."area where city_id = ".$city_id." and pid = 0 order by sort desc");
        $area_list[]	=	array("name"=>$GLOBALS['lang']['ALL'],"id"=>0);
        $GLOBALS['tmpl']->assign("area_list",$area_list);
        $cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."event_cate where is_effect = 1 order by sort desc");
        $cate_list[]	=	array("name"=>$GLOBALS['lang']['ALL'],"cid"=>0);
        $GLOBALS['tmpl']->assign("cate_list",$cate_list);
        $GLOBALS['tmpl']->assign("load_total", 6);
        $GLOBALS['tmpl']->display("mobile/mobile_youhui_event.html");

    }
}
?>