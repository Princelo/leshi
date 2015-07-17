<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

class mobile_ajaxModule extends YouhuiBaseModule
{
    public function store_index()
    {
        if(isset($_GET['type']) && $_GET['type'] != null)
            $type = $_GET['type'];
        else
            $type = 'newest';
        /*$sort_field = es_cookie::get("store_sort_field");
        $sort_type = es_cookie::get("store_sort_type");
        if($sort_type!="desc"&&$sort_type!="asc")$sort_type = "desc";

        if($sort_field!="default"&&$sort_field!="dp_count"&&$sort_field!="avg_point"&&$sort_field!="ref_avg_price")
        {
            $sort_field = "default";
        }
        if($sort_field=='default')
        {
            $sortby = " is_recommend desc,is_verify desc,dp_count desc ";
        }
        else
        {
            $sortby = $sort_field." ".$sort_type;
        }*/
        switch(strval($type))
        {
            case "newest":
                $sortby = " id desc ";
                break;
            case "recommend":
                $sortby = " is_recommend desc, is_verify desc, dp_count desc ";
                break;
            case "hot":
                $sortby = " dp_count desc, is_recommend desc, is_verify desc ";
                break;
            default:
                $sortby = " is_recommend desc,is_verify desc,dp_count desc ";
                break;
        }
        convert_req($_REQUEST);
        $_REQUEST['cid'] = intval($_REQUEST['cid']);
        $keyword = addslashes(htmlspecialchars(trim($_REQUEST['keyword'])));
        $city_id = intval($GLOBALS['deal_city']['id']);
        //分页
        $page = intval($_REQUEST['p']);
        if($page==0)
            $page = 1;
        $limit = (($page-1)*app_conf("DEAL_PAGE_SIZE")).",".app_conf("DEAL_PAGE_SIZE");


        $cate_list = load_auto_cache("cache_deal_cate");
        $cid = intval($_REQUEST['cid']);

        $cate_item = $cate_list[$cid];

        $condition = " 1=1 ";  //条件

        $url_param = array(
            "cid"	=> $_REQUEST['cid'],
            "aid"	=>	intval($_REQUEST['aid']),
            "keyword"	=>	$keyword,
        );
        //组装分组筛选
        if($_REQUEST['g']&&is_array($_REQUEST['g']))
            foreach ($_REQUEST['g'] as $k=>$v)
            {
                $url_param["g[".$k."]"] = addslashes(trim($v));
            }


        if(intval($_REQUEST['is_redirect'])==1)
        {
            app_redirect(url("youhui","store",$url_param));
        }

        unset($url_param['keyword']);
        $cache_param = $url_param;
        $cache_param['cid'] = $cate_item['id'];
        $cache_param['city_id'] = $city_id;
        $result = load_auto_cache("store_filter_nav_cache",$cache_param);

        //输出大区
        $area_id = intval($_REQUEST['aid']);
        $area_result = load_auto_cache("cache_area",array("city_id"=>$GLOBALS['deal_city']['id']));
        if($area_id>0)
        {
            $ids = load_auto_cache("deal_quan_ids",array("quan_id"=>$area_id));
            $unicode_quans = array();
            foreach($ids as $k=>$v){
                $unicode_quans[] = str_to_unicode_string($area_result[$v]['name']);
            }
            $kw_unicode = implode(" ", $unicode_quans);
            $condition .= " and (match(locate_match) against('".$kw_unicode."' IN BOOLEAN MODE))";
        }


        //输出分类
        $cate_id = $cate_item['id'];


        //输出小分类
        $deal_type_id = intval($_REQUEST['tid']);
        $deal_cate_id = $cate_id;
        if($deal_cate_id>0)
        {

            $deal_cate_name  = $cate_list[$deal_cate_id]['name'];
            $deal_cate_name_unicode = str_to_unicode_string($deal_cate_name);
            $condition .= " and (match(deal_cate_match) against('".$deal_cate_name_unicode."' IN BOOLEAN MODE)) ";


        }

        if($deal_type_id>0)
        {
            $type_list = load_auto_cache("cache_deal_cate_type",array("cate_id"=>$deal_cate_id));

            $deal_type_name = $type_list[$deal_type_id]['name'];
            $deal_type_name_unicode = str_to_unicode_string($deal_type_name);
            $condition .= " and (match(deal_cate_match) against('".$deal_type_name_unicode."' IN BOOLEAN MODE)) ";
        }


        $supplier_id = intval($_REQUEST['id']);

        if($supplier_id>0)
        {
            $supplier_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."supplier where id = ".$supplier_id);
            if($supplier_info)
            {
                $condition.=" and supplier_id = ".$supplier_id;

            }
        }

        $url_param['tag'] = addslashes($_REQUEST['tag']);
        if($url_param['tag']){
            $kw_unicode = str_to_unicode_string($url_param['tag']);
            //有筛选
            $condition .=" and (match(tags_match) against('".$kw_unicode."' IN BOOLEAN MODE))";
        }

        if($_REQUEST['g']&&is_array($_REQUEST['g']))
        {
            foreach($_REQUEST['g'] as $k=>$v)
            {
                if(trim($v)!="")
                {
                    $kw_unicode = str_to_unicode_string($v);
                    $condition .=" and (match(tags_match) against('".$kw_unicode."' IN BOOLEAN MODE))";
                }
            }
        }

        if($keyword){
            $GLOBALS['tmpl']->assign("keyword",$keyword);
            $kws_div = div_str($keyword);
            foreach($kws_div as $k=>$item)
            {
                $kw[$k] = str_to_unicode_string($item);
            }
            $kw_unicode = implode(" ",$kw);
            //有筛选
            $condition .=" and ((match(name_match,locate_match,deal_cate_match,tags_match) against('".$kw_unicode."' IN BOOLEAN MODE)) or name like '%".$keyword."%') ";
        }

        /*$sort_field = es_cookie::get("store_sort_field");
        $sort_type = es_cookie::get("store_sort_type");
        if($sort_type!="desc"&&$sort_type!="asc")$sort_type = "desc";

        if($sort_field!="default"&&$sort_field!="dp_count"&&$sort_field!="avg_point"&&$sort_field!="ref_avg_price")
        {
            $sort_field = "default";
        }
        if($sort_field=='default')
        {
            $sortby = " is_recommend desc,is_verify desc,dp_count desc ";
        }
        else
        {
            $sortby = $sort_field." ".$sort_type;
        }*/


        $result = get_store_list_for_mobile($limit,0,$condition,$sortby,false);

        $GLOBALS['tmpl']->assign("list",$result['list']);

        //输出最新加入的商家
        /*$new_stores = get_store_list(5,0,$cate_condition," id desc ",false,false);
        $GLOBALS['tmpl']->assign("new_stores",$new_stores['list']);
        if(trim($cate_condition)!='')
            $rec_stores = get_store_list(5,0, $cate_condition." and is_recommend = 1 "," id desc ",false,false);
        else
            $rec_stores = get_store_list(5,0, " is_recommend = 1 "," id desc ",false,false);
        $GLOBALS['tmpl']->assign("rec_stores",$rec_stores['list']);*/



        $return = new stdClass();
        $return->total = 10;
        $return->result = $result['list'];
        echo json_encode($return);
        exit;
    }
}
?>