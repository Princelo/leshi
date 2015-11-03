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
  height: 100%;
  margin: 0 auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.canvas {
  position: absolute;
  top: 41%;
  left:19.5%;
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
  var canvasWidth  = window.innerWidth * 0.61;
      canvas.height = canvasWidth;
      canvas.width = canvasWidth;
  container.height = canvasWidth / 640 * 1000;
  var myHeight = window.innerWidth / 640 * 1000;
  container.style.backgroundSize = window.innerWidth+'px '+myHeight+'px';
  canvas.style.top = myHeight / 1000 * 340 + 'px';
  canvas.style.index = 9;
  /*document.querySelectorAll('.solution')[0].style.position = 'absolute';
  document.querySelectorAll('.solution')[0].style.width = canvas.width+'px';
  document.querySelectorAll('.solution')[0].style.height = canvas.width+'px';
  document.querySelectorAll('.solution')[0].style.top = myHeight / 854 * 340 + 'px';
  document.querySelectorAll('.solution')[0].style.left = '20%';*/

   var canvasHeight = canvas.width,
      ctx          = canvas.getContext('2d'),
      image        = new Image(),
      brush        = new Image();

  // base64 Workaround because Same-Origin-Policy
  image.src = 'http://m-ebuy.com/images/scratch.jpg';
  image.onload = function() {
    ctx.drawImage(image, 0, 0);
    // Show the form when Image is loaded.
    //document.querySelectorAll('.solution')[0].style.visibility = 'visible';
    setTimeout(function () {
        container.style.visibility = 'visible';
    }, 100);
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
    <div class="container" id="js-container" style="visibility: hidden;background:url('http://m-ebuy.com/images/scratch-bg.png'); background-size: 100% 100%;">
      <canvas class="canvas" id="js-canvas" style="border-radius: 141px;"></canvas>
      <div class="solution" style="visibility:hidden;">
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

    function scratch_bonus2() {
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
/*
.container {
  position: relative;
  width: 100%;
  height: 100%;
  margin: 0 auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.canvas {
  position: absolute;
  top: 41%;
  left:19.5%;
}

.form {
  padding: 20px;
}*/
CSS;
        $js = <<<JS
        // depends on jQuery

(function() {
var image = { // back and front images
	'back': { 'url':'./images/jiang2.jpg', 'img':null },
	'front': { 'url':'./images/eye2.jpg', 'img':null }
};

var canvas = {'temp':null, 'draw':null}; // temp and draw canvases

var mouseDown = false;


/**
 * Returns true if this browser supports canvas
 *
 * From http://diveintohtml5.info/
 */
function supportsCanvas() {
	return !!document.createElement('canvas').getContext;
}

/**
 * Helper function to extract the coordinates from an event, whether the
 * event is a mouse or touch.
 */
function getEventCoords(ev) {
	var first, coords = {};
	var origEv = ev.originalEvent; // get from jQuery

	if (origEv.changedTouches != undefined) {
		first = origEv.changedTouches[0];
		coords.pageX = first.pageX;
		coords.pageY = first.pageY;
	} else {
		coords.pageX = ev.pageX;
		coords.pageY = ev.pageY;
	}

	return coords;
}

/**
 * Helper function to get the local coords of an event in an element,
 * since offsetX/offsetY are apparently not entirely supported, but
 * offsetLeft/offsetTop/pageX/pageY are!
 *
 * @param elem element in question
 * @param ev the event
 */
function getLocalCoords(elem, coords) {
	var ox = 0, oy = 0;

	// Walk back up the tree to calculate the total page offset of the
	// currentTarget element.  I can't tell you how happy this makes me.
	// Really.
	while (elem != null) {
		ox += elem.offsetLeft;
		oy += elem.offsetTop;
		elem = elem.offsetParent;
	}

	return { 'x': coords.pageX - ox, 'y': coords.pageY - oy };
}

/**
 * Recomposites the canvases onto the screen
 *
 * Note that my preferred method (putting the background down, then the
 * masked foreground) doesn't seem to work in FF with "source-out"
 * compositing mode (it just leaves the destination canvas blank.)  I
 * like this method because mentally it makes sense to have the
 * foreground drawn on top of the background.
 *
 * Instead, to get the same effect, we draw the whole foreground image,
 * and then mask the background (with "source-atop", which FF seems
 * happy with) and stamp that on top.  The final result is the same, but
 * it's a little bit weird since we're stamping the background on the
 * foreground.
 *
 * OPTIMIZATION: This naively redraws the entire canvas, which involves
 * four full-size image blits.  An optimization would be to track the
 * dirty rectangle in scratchLine(), and only redraw that portion (i.e.
 * in each drawImage() call, pass the dirty rectangle as well--check out
 * the drawImage() documentation for details.)  This would scale to
 * arbitrary-sized images, whereas in its current form, it will dog out
 * if the images are large.
 */
function recompositeCanvases() {
	var main = $('#maincanvas').get(0);
	//var drawthumb = $('#drawthumb').get(0);
	//var tempthumb = $('#tempthumb').get(0);
	var tempctx = canvas.temp.getContext('2d');
	var mainctx = main.getContext('2d');

	// Step 1: clear the temp
	canvas.temp.width = canvas.temp.width; // resizing clears

	// Step 2: stamp the draw on the temp (source-over)
	tempctx.drawImage(canvas.draw, 0, 0, window.innerWidth/720*579,  window.innerWidth/720*203);


	// Step 3: stamp the background on the temp (!! source-atop mode !!)
	tempctx.globalCompositeOperation = 'source-atop';
	tempctx.drawImage(image.back.img, 0, 0, window.innerWidth/720*579,  window.innerWidth/720*203);

	// Step 4: stamp the foreground on the display canvas (source-over)
	// åˆ®åˆ®å¡å‰æ™¯å›¾ç‰‡æ”¹ä¸ºå¡«å……é¢œè‰²
	mainctx.drawImage(image.front.img, 0, 0,window.innerWidth/720*579,  window.innerWidth/720*203);

	// Step 5: stamp the temp on the display canvas (source-over)
	mainctx.drawImage(canvas.temp, 0, 0, window.innerWidth/720*579,  window.innerWidth/720*203);


	// This code just updates the thumbnails:

	//drawthumb.getContext('2d').drawImage(canvas.draw, 0, 0, drawthumb.width, drawthumb.height);
	//tempthumb.getContext('2d').drawImage(canvas.temp, 0, 0, tempthumb.width, tempthumb.height);
}

/**
 * Draw a scratch line
 *
 * @param can the canvas
 * @param x,y the coordinates
 * @param fresh start a new line if true
 */
function scratchLine(can, x, y, fresh) {
	var ctx = can.getContext('2d');
	ctx.lineWidth = 45;
	ctx.lineCap = ctx.lineJoin = 'round';
	ctx.strokeStyle = '#f00'; // can be any opaque color
	if (fresh) {
		ctx.beginPath();
		// this +0.01 hackishly causes Linux Chrome to draw a
		// "zero"-length line (a single point), otherwise it doesn't
		// draw when the mouse is clicked but not moved:
		ctx.moveTo(x+0.01, y);
	}
	ctx.lineTo(x, y);
	ctx.stroke();
}

/**
 * Set up the main canvas and listeners
 */
function setupCanvases() {
	var c = $('#maincanvas').get(0);
	//var backthumb = $('#backthumb').get(0);
	//var drawthumb = $('#drawthumb').get(0);
	//var tempthumb = $('#tempthumb').get(0);
	//var forethumb = $('#forethumb').get(0);
	//var thumbwidth, thumbheight;

	// set the width and height of the main canvas from the first image
	// (assuming both images are the same dimensions)
	//c.width = image.back.img.width;
	c.width = window.innerWidth / 720 * 579;
	//c.height = image.back.img.height;
	c.height = window.innerWidth / 720 * 203;

	// create the temp and draw canvases, and set their dimensions
	// to the same as the main canvas:
	canvas.temp = document.createElement('canvas');
	canvas.draw = document.createElement('canvas');
	canvas.temp.width = canvas.draw.width = c.width;
	canvas.temp.height = canvas.draw.height = c.height;

	// figure thumbnail sizes
	//thumbwidth = parseInt(c.width * 0.2);
	//thumbheight = parseInt(c.height * 0.2);

	//backthumb.width = drawthumb.width = tempthumb.width = forethumb.width = thumbwidth;
	//backthumb.height = drawthumb.height = tempthumb.height = forethumb.height = thumbheight;

	//tempthumb.getContext('2d').globalCompositeOperation = 'copy';
	//drawthumb.getContext('2d').globalCompositeOperation = 'copy';
	//backthumb.getContext('2d').drawImage(image.back.img, 0, 0, backthumb.width, backthumb.height);
	//forethumb.getContext('2d').drawImage(image.front.img, 0, 0, forethumb.width, forethumb.height);

	// draw the stuff to start
	recompositeCanvases();

	/**
	 * On mouse down, draw a line starting fresh
	 */
	function mousedown_handler(e) {
		var local = getLocalCoords(c, getEventCoords(e));
		mouseDown = true;

		scratchLine(canvas.draw, local.x, local.y, true);
		recompositeCanvases();

		return false;
	};

	/**
	 * On mouse move, if mouse down, draw a line
	 *
	 * We do this on the window to smoothly handle mousing outside
	 * the canvas
	 */
	function mousemove_handler(e) {
		if (!mouseDown) { return true; }

		var local = getLocalCoords(c, getEventCoords(e));

		scratchLine(canvas.draw, local.x, local.y, false);
		recompositeCanvases();

		return false;
	};

	/**
	 * On mouseup.  (Listens on window to catch out-of-canvas events.)
	 */
	function mouseup_handler(e) {
		if (mouseDown) {
			mouseDown = false;
			return false;
		}

		return true;
	};

	$('#maincanvas').on('mousedown', mousedown_handler)
		.on('touchstart', mousedown_handler);

	$(document).on('mousemove', mousemove_handler);
	$(document).on('touchmove', mousemove_handler);

	$(document).on('mouseup', mouseup_handler);
	$(document).on('touchend', mouseup_handler);
}

/**
 * Set up the DOM when loading is complete
 */
function loadingComplete() {
	$('#loading').hide();
	$('#main').show();
}

/**
 * Handle loading of needed image resources
 */
function loadImages() {
	var loadCount = 0;
	var loadTotal = 0;
	var loadingIndicator;

	function imageLoaded(e) {
		loadCount++;

		if (loadCount >= loadTotal) {
			setupCanvases();
			loadingComplete();
		}
	}

	for (k in image) if (image.hasOwnProperty(k))
		loadTotal++;

	for (k in image) if (image.hasOwnProperty(k)) {
		image[k].img = document.createElement('img'); // image is global
		$(image[k].img).on('load', imageLoaded);
		image[k].img.src = image[k].url;
	}
}


/**
 * Handle page load
 */
$(function() {
	if (supportsCanvas()) {
		loadImages();

		$('#resetbutton').on('click', function() {
				// clear the draw canvas
				canvas.draw.width = canvas.draw.width;
				recompositeCanvases();

				return false;
			});
	} else {
		$('#loading').hide();
		$('#lamebrowser').show();
	}
});

})();

JS;
        $html = <<<HTML
<!DOCTYPE html>
<html>
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
<style type="text/css">
.hidden {
	display: none;
}
</style>
<script src="http://libs.baidu.com/jquery/1.8.0/jquery.js"></script>
<script>
$js
</script>
</head>
<body id="body" style="">
	<div class="hidden" id="main" style="">
		<div>
			<canvas id="maincanvas" style="">
			</canvas>
		</div>
		<div>
			<p></p>
			<input style="display:none;" id="resetbutton" type="button" value="再刮一次"></input>
		</div>
	</div>
	<script>
	    document.getElementById('body').style.backgroundImage = 'url("http://m-ebuy.com/images/backimg.jpg")';
	    document.getElementById('body').style.backgroundRepeat = 'no-repeat';
	    document.getElementById('body').style.backgroundSize = '100% 100%';
        document.getElementById('main').style.height = window.innerWidth/720 * 1118 + 'px';
        document.getElementById('maincanvas').style.marginTop = window.innerWidth / 720 * 505 + 'px';
        document.getElementById('maincanvas').style.marginLeft = window.innerWidth / 720 * 65 + 'px';
    </script>
	<!-- main -->
	<div id="loading hidden"><p>[正在拼命加载中<span class="blink">...</span>]</div>

	<div class="hidden" id="lamebrowser">
		<p>
		<b>你当前浏览器不支持html5.</b>
		请更换或下载：
		<a href="http://www.google.com/chrome/">Chrome</a>,
		<a href="http://firefox.com/">Firefox</a>,
		<a href="http://www.opera.com/">Opera</a>, 或者
		<a href="http://windows.microsoft.com/en-us/internet-explorer/products/ie/home">IE9</a>.
		只有这样,你才能参加这个活动，对不起！
	</div>
</body>
</html>

HTML;
        exit($html);


    }
}
?>