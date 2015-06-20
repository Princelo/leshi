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
            <?php 
                switch($news_infos[0]->type){
                    case 'contribute':
                        echo "<span>&nbsp;>&nbsp</span><a>大赛槪况</a><span>&nbsp;>&nbsp;</span><a>赞助单位</a>";
                        break;
                    case 'announcement':
                        echo "<span>&nbsp;>&nbsp</span><a>新闻中心</a><span>&nbsp;>&nbsp;</span><a>赛事公告</a>";
                        break;
                    case 'default':
                        echo "<span>&nbsp;>&nbsp</span><a>新闻中心</a><span>&nbsp;>&nbsp;</span><a>赛事新闻</a>";
                        break;
                    default:
                        break;
                }
            ?>
            <!--<span>&nbsp;>&nbsp;</span>
            <a>新闻中心</a>
            <span>&nbsp;>&nbsp;</span>
            <a>赛事新闻</a>-->
            <div style="display:none"><?php print_r($news_infos); ?></div>
        </div>
    </div>
    <div class="showimg-block essay-content-block" id="showimg-block">
    <div class="essay-title"><?php echo $news_infos[0]-> news_title; ?></div>
    <div class="essay-content"><?php echo $news_infos[0]-> news_content; ?></div>
    </div>
    <div style="clear:both"></div>
    <div class="photo-ad">
        <div class="ad1"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad1.png" alt=""></a></div>
        <div class="ad2"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad2.png" alt=""></a></div>
        <div class="ad3"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad3.png" alt=""></a></div>
    </div>
    <div style="clear:both"></div>
</div>
