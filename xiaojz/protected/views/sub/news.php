<?php
if(isset($_COOKIE['user_name']))
echo $_COOKIE['user_name'];
?>
<div style="clear:both"></div>
<div class="photo-block">
<div class="mini-banner2"><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL; ?>mini-banner2.jpg" alt=""></div>
    <div class="bread-block">
        <span class="bread-photo"></span>
        <div class="bread-numb">
            <a href="<?php echo SITE_URL; ?>">首页</a>
            <span>&nbsp;>&nbsp;</span>
            <a>新闻中心</a>
            <span>&nbsp;>&nbsp;</span>
            <a>赛事新闻</a>
        </div>
    </div>
    <div class="showimg-block showessay-block" id="showimg-block">
    <img style="position:relative; top:20px; left:470px; width:150px; height:150px;" src="images/lightbox-ico-loading.gif" />
    <script>setPage("<?php echo SITE_URL; ?>?r=ajax/fetchnews&page=1");</script>
    </div>
    <div class="photo-ad">
        <div class="ad1"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad1.png" alt=""></a></div>
        <div class="ad2"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad2.png" alt=""></a></div>
        <div class="ad3"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad3.png" alt=""></a></div>
    </div>
    <div style="clear:both;"></div>
</div>
