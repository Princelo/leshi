<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>global.css" type="text/css" media="screen" charset="utf-8">
    <link href="<?php echo CSS_URL; ?>tempates_div.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL; ?>jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" />
    <link type="image/vnd.microsoft.icon" rel="shortcut icon" href="<?php echo SITE_URL; ?>favicon.ico">
    <title>中国少儿小金钟音乐大赛花都赛区 - 乐时网</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="<?php echo JS_URL ?>jquery.lightbox-0.5.min.js"></script>
    <script src="<?php echo JS_URL ?>slider.js"></script>
    <script src="<?php echo JS_URL ?>ajax.js"></script>
    <script src="<?php echo JS_URL ?>jquery.lazyload.js"></script>
    <script>$(document).ready(function(){
        $('#images-show .pic').lightBox();
        $("img").lazyload({failurelimit:4,effect:"fadeIn"});
    })
    </script>
    <script>
			var cache=new Array();
			function setPage(url){
				var obj=document.getElementById("showimg-block");
				if(typeof(cache[url])=="undefined"){
					var ajax=Ajax();
					ajax.get(url,function(data){
							obj.innerHTML=data;
                            $(document).ready(function(){$('#images-show .pic').lightBox();});
                            $("#images-show img").lazyload({failurelimit:4,effect:"fadeIn"});
                            $("html,body").animate({scrollTop:500},500);
							cache[url]=data;	
						});
					//alert(url);
				}else{
					obj.innerHTML=cache[url];	
                    $(document).ready(function(){$('#images-show .pic').lightBox();})
                    $("#images-show img").lazyload({failurelimit:4,effect:"fadeIn"});
                    $("html,body").animate({scrollTop:500},500);
				}	
			}
            //setPage("<?php echo SITE_URL; ?>?r=ajax/fetchall&page=1");
		</script>
</head>
<body>
<div id="user-info">
    <div style="width:996px; margin:0 auto;">
    <span class="welcome"><?php //if(isset($_COOKIE['user_name'])) echo '<strong>'.$_COOKIE['user_name'].'</strong>'; else echo 'Hi';?>Hi!欢迎来到中国少儿小金钟</span>
    <div class="login">
    <?php if(isset($_COOKIE['user_name'])) echo "<!--"; ?>    
    <div class="quicklogin-block">
        <form class="quicklogin" action="<?php echo SITE_URL; ?>?r=user/quicklogin" method="post" name="login">
        <div class="quicklogin-text">
             <label>会员登陆：</label>
            <input type="text" size="12" class="inputtext" name="username" placeholder="用户名">
            <input type="password" size="12" class="inputtext" name="password" placeholder="密码">
        </div>
        <input type="submit" class="inputsub1" value="" name="Submit">
        <input type="button" onclick="window.open('<?php echo SITE_URL; ?>?r=/user/register');" class="inputsub2" value="" name="Submit2">
        </form>
    </div>
    <?php if(isset($_COOKIE['user_name'])) echo "--><div class=\"welcome2\"><span>{$_COOKIE['user_name']}，欢迎你回来！</span><a href=\"".SITE_URL."?r=user/logout\">登出</a></div>"; ?>
        <!--
        <?php //if(isset($_COOKIE['user_name'])) echo "<span style=\"float:left;\">".$_COOKIE['user_name']."，欢迎你回来！</span><a href=\"". SITE_URL. "?r=user/logout\">登出</a><!--"; ?>
        <span style="float:left;">请先</span>
        <a style="float:left;" class="login-btn" href="<?php //echo SITE_URL; ?>?r=user/login"></a>
        <span style="float:left;">&nbsp;或&nbsp;</span>
        <a style="float:left;" class="register" href="<?php //echo SITE_URL;?>?r=user/register"></a>
        <?php //if(isset($_COOKIE['user_name'])) echo "-->"; ?>-->
    </div>
    </div>
</div>
<div style="clear:both"></div>
<div id="header2">
<div id="logo"><img src="<?php echo IMG_URL; ?>logo.png" alt="" /></div>
</div>
    <div class="home-main2">
        <div class="laser-top"></div>
        <div class="menu-logo"></div>
    </div>
    <div class="header-menu2">
    <ul class="menu-out">
        <li class=""><a href="<?php echo SITE_URL; ?>">首页</a></li>
        <li>
            <a href="./index.php?r=sub/newsother&type=profile">大赛槪况</a>
            <div class="menu-in">
                <ul>
                    <li><a href="./index.php?r=sub/newsother&type=profile">比赛介绍</a></li>
                    <li><a href="./index.php?r=sub/newsother&type=rule">赛事规则</a></li>
                    <li><a href="./index.php?r=sub/contribute">赞助单位</a></li>
                    <li><a href="./index.php?r=sub/newsother&type=district">分赛区机构</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="./index.php?r=sub/announcement">新闻中心</a>
            <div class="menu-in">
                <ul>
                    <li><a href="./index.php?r=sub/announcement">赛事公告</a></li>
                    <li><a href="./index.php?r=sub/news">赛事新闻</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="./index.php?r=sub/photobattle">精彩瞬间</a>
            <div class="menu-in">
                <ul>
                    <li><a href="./index.php?r=sub/photo">选手风采</a></li>
                    <li><a href="./index.php?r=sub/photobattle">比赛瞬间</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="./index.php?r=sub/video">视频欣赏</a>
            <div class="menu-in">
                <ul>
                    <li><a href="./index.php?r=sub/video">选手视频</a></li>
                    <li><a href="./index.php?r=sub/videonews">新闻视频</a></li>
                    <li><a href="./index.php?r=sub/videotitbits">花絮视频</a></li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo SITE_URL; ?>?r=sub/vote">选手投票</a></li>
    </ul>
    </div>

<?php echo $content; ?>

<div style="clean:both;"></div>
<div id="footer">
    <div class="footer-block">
    <div class="info">
        <ul>
            <li class="footer-info-title">关于</li>
            <li><a href="./index.php?r=sub/newsother&type=about&footinfo=yes">中国小金钟</a></li>
            <li><a href="./index.php?r=sub/newsother&type=star&footinfo=yes">形象代言人</a></li>
            <li><a href="./index.php?r=sub/newsother&type=host&footinfo=yes">大赛主持人</a></li>
            <li><a href="./index.php?r=sub/newsother&type=ambassador&footinfo=yes">爱心大使</a></li>
        </ul>
        <ul>
            <li class="footer-info-title">团队</li>
            <li><a href="./index.php?r=sub/newsother&type=organize&footinfo=yes">组织机构</a></li>
            <li><a href="./index.php?r=sub/newsother&type=workteam&footinfo=yes">执行团队</a></li>
            <li><a href="./index.php?r=sub/newsother&type=partner&footinfo=yes">合作伙伴</a></li>
        </ul>
        <ul>
            <li class="footer-info-title">声明</li>
            <li><a href="./index.php?r=sub/newsother&type=right&footinfo=yes">大赛授权书</a></li>
            <li><a href="./index.php?r=sub/newsother&type=teacher&footinfo=yes">大赛导师</a></li>
            <li><a href="./index.php?r=sub/newsother&type=certification&footinfo=yes">大赛证书</a></li>
            <li><a href="./index.php?r=sub/newsother&type=promotion&footinfo=yes">大赛晋级卡</a></li>
        </ul>
        <ul>
            <li class="footer-info-title">帮忙</li>
            <li><a href="./index.php?r=sub/newsother&type=contact&footinfo=yes">联系方式</a></li>
            <li><a href="./index.php?r=sub/newsother&type=board&footinfo=yes">分赛区牌匾</a></li>
            <li><a href="./index.php?r=sub/newsother&type=bill&footinfo=yes">大赛流程</a></li>
        </ul>
    </div>
    <div class="contact">
    <div class="copyright-logo"><img src="<?php echo IMG_URL; ?>copyright-logo.png" alt="" /></div>
        <div class="tel">
            <a class="tel-icon">资讯电话</a>
            <p>020-61293802</p>
        </div>
    </div>
    <div class="copyright">
        <p>版权所有&nbsp;中国小金钟&nbsp;粤ICP备08007310号-3 形象策划：中国小金钟&nbsp;&nbsp;Copyright&nbsp;@&nbsp;2013&nbsp;www.xiaojz.com&nbsp;All&nbsp;Rights&nbsp;Reserved</p>
        <p><a href="http://www.unvweb.com">网站设计：广州远维网络科技有限公司</a></p>
    </div>
    </div>
</div>
</body>
</html>
