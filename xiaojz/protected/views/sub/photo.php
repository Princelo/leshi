<?php
//if(isset($_COOKIE['user_name']))
//echo $_COOKIE['user_name'];
?>
<div style="clear:both"></div>
<div class="photo-block">
<div class="mini-banner2"><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL; ?>mini-banner2.jpg" alt=""></div>
    <div class="bread-block">
        <span class="bread-photo"></span>
        <div class="bread-numb">
            <a href="<?php echo SITE_URL; ?>">首页</a>
            <span>&nbsp;>&nbsp;</span>
            <a>精彩瞬间</a>
            <span>&nbsp;>&nbsp;</span>
            <a>选手风采</a>
        </div>
        <div class="category">
            <label>请选择分类</label>
            <a class="categoryall" href="javascript:setPage('<?php echo SITE_URL ?>?r=ajax/fetchall');">全部</a>
            <a class="category1" href="javascript:setPage('<?php echo SITE_URL ?>?r=ajax/fetchone');">分类一</a>
            <a class="category2" href="javascript:setPage('<?php echo SITE_URL ?>?r=ajax/fetchtwo');">分类二</a>
            <a class="category3" href="javascript:setPage('<?php echo SITE_URL ?>?r=ajax/fetchthree');">分类三</a>
            <a class="category4" href="javascript:setPage('<?php echo SITE_URL ?>?r=ajax/fetchfour');">分类四</a>
        </div>
    </div>
    <div class="showimg-block" id="showimg-block">
    <img style="position:relative; top:20px; left:470px; width:150px; height:150px;" src="images/lightbox-ico-loading.gif" />
    <script>setPage("<?php echo SITE_URL; ?>?r=ajax/fetchall&page=1");</script>
    </div>
    <div style="clear:both"></div>
    <div class="photo-ad">
        <div class="ad1"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad1.png" alt=""></a></div>
        <div class="ad2"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad2.png" alt=""></a></div>
        <div class="ad3"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad3.png" alt=""></a></div>
    </div>
    <div style="clear:both"></div>
</div>
