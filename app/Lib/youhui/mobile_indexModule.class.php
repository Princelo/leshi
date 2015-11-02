<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/deal.php';

class mobile_indexModule extends YouhuiBaseModule
{
    public function index()
    {
        $GLOBALS['tmpl']->caching = true;
        $GLOBALS['tmpl']->cache_lifetime = 600;  //优惠首页缓存10分钟
        //$cache_id  = md5(MODULE_NAME.ACTION_NAME.$GLOBALS['deal_city']['id']);
        $cache_id  = md5(MODULE_NAME.ACTION_NAME);
        if (!$GLOBALS['tmpl']->is_cached('mobile/youhui_index.html', $cache_id))
        {
            //make_deal_cate_js();
            //make_deal_region_js();

            //$result = load_auto_cache("fyouhui_filter_nav_cache",array('city_id'=>$GLOBALS['deal_city']['id']));
            //$GLOBALS['tmpl']->assign("cate_list",$result['cate_list']);
            //$GLOBALS['tmpl']->assign("area_list",$result['area_list']);

            //输出右侧的优惠列表
            //$youhui_list = get_free_youhui_list(5,0,""," view_count desc ");
            //$youhui_list = $youhui_list['list'];
            //$GLOBALS['tmpl']->assign("youhui_list",$youhui_list);
            //$right_youhui_html = $GLOBALS['tmpl']->fetch("index/index_right_youhui.html");
            //$GLOBALS['tmpl']->assign("right_youhui_html",$right_youhui_html);

            //输出右侧商家
            //$city_ids = load_auto_cache("deal_city_belone_ids",array("city_id"=>intval($GLOBALS['deal_city']['id'])));
            //if($city_ids)
            //    $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location use index(avg_point) WHERE  city_id in(".implode(",",$city_ids).") and is_effect = 1 order by avg_point desc limit 5");
            //else
            //    $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location use index(avg_point) WHERE  is_effect = 1 order by avg_point desc limit 5");

            //$GLOBALS['tmpl']->assign("store_list",$store_list);
            //$right_store_html = $GLOBALS['tmpl']->fetch("index/index_right_store.html");
            //$GLOBALS['tmpl']->assign("right_store_html",$right_store_html);

            //输出左侧推荐分类
            //$recommend_cate = $GLOBALS['db']->getAll("select id,name from ".DB_PREFIX."deal_cate where rec_youhui = 1 order by sort desc");
            //$recommend_cate_html = "";
            /*foreach($recommend_cate as $cate)
            {
                $youhui_list = get_free_youhui_list(8,$cate['id'],"","");
                $youhui_list = $youhui_list['list'];
                $GLOBALS['tmpl']->assign("youhui_list",$youhui_list);

                $scate_list = $GLOBALS['db']->getAll("select t.* from ".DB_PREFIX."deal_cate_type as t left join ".DB_PREFIX."deal_cate_type_link as l on l.deal_cate_type_id = t.id where t.is_recommend = 1 and l.cate_id = ".$cate['id']." order by sort desc");
                $GLOBALS['tmpl']->assign("scate_list", $scate_list);
                $GLOBALS['tmpl']->assign("bcate_item", $cate);
                $recommend_cate_html.=$GLOBALS['tmpl']->fetch("inc/recommend_cate_youhui.html");
            }
            $GLOBALS['tmpl']->assign("recommend_cate_html",$recommend_cate_html);*/

            //输出下载的动态
            //$down_load_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_msg_list where is_youhui = 1 and youhui_id <> 0 order by create_time desc limit 50");
            /*foreach($down_load_list as $k=>$v)
            {
                $down_load_list[$k]['youhui_name'] = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."youhui where id = ".intval($v['youhui_id']));
            }
            $GLOBALS['tmpl']->assign("down_load_list",$down_load_list);*/


        }
        $GLOBALS['tmpl']->display("mobile/youhui_index.html",$cache_id);
    }




    public function daijin_index()
    {
        $GLOBALS['tmpl']->caching = true;
        $GLOBALS['tmpl']->cache_lifetime = 600;  //代金券首页缓存10分钟
        $cache_id  = md5(MODULE_NAME.ACTION_NAME.$GLOBALS['deal_city']['id']);
        if (!$GLOBALS['tmpl']->is_cached('daijin_index.html', $cache_id))
        {
            make_deal_cate_js();
            make_deal_region_js();

            $result = load_auto_cache("byouhui_filter_nav_cache",array('city_id'=>$GLOBALS['deal_city']['id']));
            $GLOBALS['tmpl']->assign("cate_list",$result['cate_list']);
            $GLOBALS['tmpl']->assign("area_list",$result['area_list']);

            //输出右侧的优惠列表
            $result = search_youhui_list(5,0,"","",false,"",$GLOBALS['deal_city']['id']);
            $daijin_list = $result['list'];
            $GLOBALS['tmpl']->assign("daijin_list",$daijin_list);
            $right_daijin_html = $GLOBALS['tmpl']->fetch("index/index_right_daijin.html");
            $GLOBALS['tmpl']->assign("right_daijin_html",$right_daijin_html);

            //输出右侧商家
            $city_ids = load_auto_cache("deal_city_belone_ids",array("city_id"=>intval($GLOBALS['deal_city']['id'])));
            if($city_ids)
                $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location use index(avg_point) WHERE  city_id in(".implode(",",$city_ids).") and is_effect = 1 order by avg_point desc limit 5");
            else
                $store_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."supplier_location use index(avg_point) WHERE  is_effect = 1 order by avg_point desc limit 5");

            $GLOBALS['tmpl']->assign("store_list",$store_list);
            $right_store_html = $GLOBALS['tmpl']->fetch("index/index_right_store.html");
            $GLOBALS['tmpl']->assign("right_store_html",$right_store_html);

            //输出左侧推荐分类
            $recommend_cate = $GLOBALS['db']->getAll("select id,name from ".DB_PREFIX."deal_cate where rec_daijin = 1 order by sort desc");
            $recommend_cate_html = "";
            foreach($recommend_cate as $cate)
            {
                $daijin_list = search_youhui_list(8,$cate['id'],"","",false,"",$GLOBALS['deal_city']['id']);
                $daijin_list = $daijin_list['list'];
                $GLOBALS['tmpl']->assign("daijin_list",$daijin_list);

                $scate_list = $GLOBALS['db']->getAll("select t.* from ".DB_PREFIX."deal_cate_type as t left join ".DB_PREFIX."deal_cate_type_link as l on l.deal_cate_type_id = t.id where t.is_recommend = 1 and l.cate_id = ".$cate['id']." order by sort desc");
                $GLOBALS['tmpl']->assign("scate_list", $scate_list);
                $GLOBALS['tmpl']->assign("bcate_item", $cate);
                $recommend_cate_html.=$GLOBALS['tmpl']->fetch("inc/recommend_cate_daijin.html");
            }
            $GLOBALS['tmpl']->assign("recommend_cate_html",$recommend_cate_html);



        }
        $GLOBALS['tmpl']->display("daijin_index.html",$cache_id);
    }


    /**
     * 输出推荐达人
     */
    function load_index_daren_list(){
        $rnd_daren_list = get_rand_user(20,1);
        $GLOBALS['tmpl']->assign("rnd_daren_list",$rnd_daren_list);
        return $GLOBALS['tmpl']->fetch("index/index_daren_list.html");
    }

    function scratch_bonus() {
        $user_id = intval($GLOBALS['user_info']['id']);
        $bonus_no = rand(0, 9);
        $GLOBALS['db']->query('insert into fanwe_scratch_bonus (user_id, bonus_no) values ('.$user_id.', '.$bonus_no.')');
        switch ($bonus_no) {
            case 0:
                $bonus = '奖品一';
                break;
            case 1:
                $bonus = '奖品二';
                break;
            case 3:
                $bonus = '奖品三';
                break;
            case 4:
                $bonus = '奖品四';
                break;
            case 5:
                $bonus = '奖品五';
                break;
            case 6:
                $bonus = '奖品六';
                break;
            case 7:
                $bonus = '奖品七';
                break;
            case 8:
                $bonus = '奖品八';
                break;
            case 9:
                $bonus = '奖品九';
                break;
            default:
                $bonus = '';
                break;
        }
        $css = <<<CSS
body {
  padding: 0;
  margin: 0;
}

.container {
  position: relative;
  width: 100%;
  _height: 100%;
  margin: 0 auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.canvas {
  position: absolute;
  top: 0;
}

.form {
  padding: 20px;
}
CSS;
        $js = <<<JS
(function() {

  'use strict';

  var isDrawing, lastPoint;
  var container    = document.getElementById('js-container');
  var canvas       = document.getElementById('js-canvas');
  var canvasWidth  = window.innerWidth * 0.6;
      canvas.height = canvasWidth;
      canvas.width = canvasWidth;
   var canvasHeight = canvas.width,
      ctx          = canvas.getContext('2d'),
      image        = new Image(),
      brush        = new Image();

  // base64 Workaround because Same-Origin-Policy
  //image.src = 'data:image/png;base64,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';
  image.src = 'http://m-ebuy.com/images/scratch.jpg';
  image.onload = function() {
    ctx.drawImage(image, 0, 0);
    // Show the form when Image is loaded.
    document.querySelectorAll('.form')[0].style.visibility = 'visible';
  };
  brush.src = 'data:image/png;base64,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';

  canvas.addEventListener('mousedown', handleMouseDown, false);
  canvas.addEventListener('touchstart', handleMouseDown, false);
  canvas.addEventListener('mousemove', handleMouseMove, false);
  canvas.addEventListener('touchmove', handleMouseMove, false);
  canvas.addEventListener('mouseup', handleMouseUp, false);
  canvas.addEventListener('touchend', handleMouseUp, false);

  function distanceBetween(point1, point2) {
    return Math.sqrt(Math.pow(point2.x - point1.x, 2) + Math.pow(point2.y - point1.y, 2));
  }

  function angleBetween(point1, point2) {
    return Math.atan2( point2.x - point1.x, point2.y - point1.y );
  }

  // Only test every `stride` pixel. `stride`x faster,
  // but might lead to inaccuracy
  function getFilledInPixels(stride) {
    if (!stride || stride < 1) { stride = 1; }

    var pixels   = ctx.getImageData(0, 0, canvasWidth, canvasHeight),
        pdata    = pixels.data,
        l        = pdata.length,
        total    = (l / stride),
        count    = 0;

    // Iterate over all pixels
    for(var i = count = 0; i < l; i += stride) {
      if (parseInt(pdata[i]) === 0) {
        count++;
      }
    }

    return Math.round((count / total) * 100);
  }

  function getMouse(e, canvas) {
    var offsetX = 0, offsetY = 0, mx, my;

    if (canvas.offsetParent !== undefined) {
      do {
        offsetX += canvas.offsetLeft;
        offsetY += canvas.offsetTop;
      } while ((canvas = canvas.offsetParent));
    }

    mx = e.pageX - offsetX;
    my = e.pageY - offsetY;

    return {x: mx, y: my};
  }

  function handlePercentage(filledInPixels) {
    filledInPixels = filledInPixels || 0;
    console.log(filledInPixels + '%');
    if (filledInPixels > 50) {
      canvas.parentNode.removeChild(canvas);
    }
  }

  function handleMouseDown(e) {
    isDrawing = true;
    lastPoint = getMouse(e, canvas);
  }

  function handleMouseMove(e) {
    if (!isDrawing) { return; }

    e.preventDefault();

    var currentPoint = getMouse(e, canvas),
        dist = distanceBetween(lastPoint, currentPoint),
        angle = angleBetween(lastPoint, currentPoint),
        x, y;

    for (var i = 0; i < dist; i++) {
      x = lastPoint.x + (Math.sin(angle) * i) - 25;
      y = lastPoint.y + (Math.cos(angle) * i) - 25;
      ctx.globalCompositeOperation = 'destination-out';
      ctx.drawImage(brush, x, y);
    }

    lastPoint = currentPoint;
    handlePercentage(getFilledInPixels(32));
  }

  function handleMouseUp(e) {
    isDrawing = false;
  }

})();
JS;
        $html = <<<HTML
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-control" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="keywords" content="微店,品牌店铺,商盟" />
    <meta name="description" content="本地一体化店铺系统 ,M网演示站" />
    <title>M网 -  刮刮乐</title>
    <style>
    $css
    </style>
</head>
<body id="cis_index">
    <div class="container" id="js-container" style="background:url('http://m-ebuy.com/images/scratch-bg.png'); background-size: 100%;">
      <canvas class="canvas" id="js-canvas" style="border-radius: 141px;"></canvas>
      <div class="solution" style="visibility:hidden; background:url('http://m-ebuy.com/images/scratch-bg.png')">
        恭喜您获得: $bonus !
      </div>
    </div>
    <script>
    $js
    </script>
</body>
</html>
HTML;
        exit($html);


    }
}
?>