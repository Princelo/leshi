<?php

require APP_ROOT_PATH.'app/Lib/deal.php';
require APP_ROOT_PATH.'app/Lib/youhui_lib.php';
class mobile_indexModule extends ShopBaseModule
{
    public function index()
    {
        $GLOBALS['tmpl']->caching = true;
        $GLOBALS['tmpl']->cache_lifetime = 600;  //首页缓存10分钟
        //$cache_id  = md5(MODULE_NAME.ACTION_NAME.$GLOBALS['deal_city']['id']);
        $cache_id  = md5(MODULE_NAME.ACTION_NAME);
        if (!$GLOBALS['tmpl']->is_cached('mobile/index.html', $cache_id) && true)
        {
            $youhui_html = $this->index_youhui();
            $GLOBALS['tmpl']->assign("youhui_html",$youhui_html);
            $event_html = $this->index_event();
            //$GLOBALS['tmpl']->assign("youhui_html",$youhui_html);
            $GLOBALS['tmpl']->assign("event_html",$event_html);
            $store_html = $this->index_store();
            $GLOBALS['tmpl']->assign("store_html",$store_html);

        }
        $GLOBALS['tmpl']->display("mobile/mobile_index.html", $cache_id);
    }


    //左侧模块
    public function index_store()
    {
        $city_ids = load_auto_cache("deal_city_belone_ids",array("city_id"=>intval($GLOBALS['deal_city']['id'])));
        if($city_ids)
            $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location  use index (search_idx1, is_verify) WHERE is_recommend=1 AND city_id in(".implode(",",$city_ids).") and is_effect = 1 order by is_verify desc,sort desc");
        else
            $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location  use index (search_idx1, is_verify) WHERE is_recommend=1 AND is_effect = 1 order by is_verify desc,sort desc");

        $GLOBALS['tmpl']->assign("store_list",$store_list);
        return $GLOBALS['tmpl']->fetch("mobile/index/store_home.html");
    }
    public function index_youhui()
    {
        $youhui_list = get_free_youhui_list(0,0," is_recommend = 1 ","");
        $youhui_list = $youhui_list['list'];
        $GLOBALS['tmpl']->assign("youhui_list",$youhui_list);
        $bcate_list = load_dynamic_cache("INDEX_RECOMMEND_BCATE");
        $GLOBALS['tmpl']->assign("bcate_list",$bcate_list);
        return $GLOBALS['tmpl']->fetch("mobile/index/youhui_home.html");
    }
    public function index_event()
    {
        $bcate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."event_cate where is_effect = 1 order by sort desc limit 8");
        $GLOBALS['tmpl']->assign("bcate_list",$bcate_list);
        $event_list  = search_event_list(0,0,$GLOBALS['deal_city']['id'],"is_recommend = 1 ");
        $event_list = $event_list['list'];
        $GLOBALS['tmpl']->assign("event_list",$event_list);
        return $GLOBALS['tmpl']->fetch("mobile/index/event_home.html");
    }

}
?>