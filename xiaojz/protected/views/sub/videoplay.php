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
            <a>视频欣赏</a>
            <span>&nbsp;>&nbsp;</span>
            <?php 
            switch($video_infos[0]->video_category){
                case '0':
                    echo "<a>选手视频</a>";
                    break;
                case '1':
                    echo "<a>新闻视频</a>";
                    break;
                case '2':
                    echo "<a>花絮视频</a>";
                    break;
                defauft:
                    break;
            }?>
        </div>
    </div>
    <div class="showimg-block essay-content-block" id="showimg-block">
    <div class="video-title"><?php echo $video_infos[0]-> video_title; ?></div>
    <div class="video-introduce"><label>视频介绍：</label><?php echo $video_infos[0]->video_introduce; ?></div>
    <div class="video-content"><embed height="314" width="516" align="middle" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" quality="high" src="http://static.youku.com/v/swf/qplayer.swf?VideoIDS=<?php echo $video_infos[0]-> video_youku_id; ?>=&isAutoPlay=false&isShowRelatedVideo=false&embedid=-&showAd=0"></div>
    </div>
    <div style="clear:both"></div>
    <div class="photo-ad">
        <div class="ad1"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad1.png" alt=""></a></div>
        <div class="ad2"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad2.png" alt=""></a></div>
        <div class="ad3"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad3.png" alt=""></a></div>
    </div>
    <div style="clear:both"></div>
</div>
