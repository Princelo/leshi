<div style="clear:both"></div>
<div class="photo-block">
<!--<div class="mini-banner2"><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL; ?>mini-banner2.jpg" alt=""></div>
    <div class="bread-block">
        <span class="bread-photo"></span>
        <div class="bread-numb">
            <a href="<?php echo SITE_URL; ?>">首页</a>
            <span>&nbsp;>&nbsp;</span>
            <a>新闻中心</a>
            <span>&nbsp;>&nbsp;</span>
            <a>赛事新闻</a>
        </div>
    </div>-->
    <div class="showimg-block essay-content-block <?php if(isset($_GET['footinfo'])) echo "footinfo".$_GET['footinfo']; ?>" id="showimg-block">
<?php //print_r($news_infos);exit; ?>
    <div class="essay-title"><?php echo $news_infos-> news_title; ?></div>
    <div class="essay-content"><?php echo $news_infos-> news_content; ?></div>
    </div>
    <?php
        if(isset($_GET['footinfo'])){ ?>
        <div class="footinfo">
            <div><span class="separator">关于</span></div>
            <ul>
                <li><a href="index.php?r=sub/newsother&type=about&footinfo=yes">中国小金钟</a></li>
                <li><a href="index.php?r=sub/newsother&type=star&footinfo=yes">形象代言人</a></li>
                <li><a href="index.php?r=sub/newsother&type=host&footinfo=yes">大赛主持人</a></li>
                <li><a href="index.php?r=sub/newsother&type=ambassdor&footinfo=yes">爱心大使</a></li>
            </ul>
            <div><span class="separator">团队</span></div>
            <ul>
                <li><a href="index.php?r=sub/newsother&type=organize&footinfo=yes">组织机构</a></li>
                <li><a href="index.php?r=sub/newsother&type=workteam&footinfo=yes">执行团队</a></li>
                <li><a href="index.php?r=sub/newsother&type=partner&footinfo=yes">合作伙伴</a></li>
            </ul>
            <div><span class="separator">声明</span></div>
            <ul>
                <li><a href="index.php?r=sub/newsother&type=right&footinfo=yes">大赛授权书</a></li>
                <li><a href="index.php?r=sub/newsother&type=teacher&footinfo=yes">大赛导师</a></li>
                <li><a href="index.php?r=sub/newsother&type=certification&footinfo=yes">大赛证书</a></li>
                <li><a href="index.php?r=sub/newsother&type=promotion&footinfo=yes">大赛晋级卡</a></li>
            </ul>
            <div><span class="separator">帮助</span></div>
            <ul>
                <li><a href="index.php?r=sub/newsother&type=contact&footinfo=yes">联系方式</a></li>
                <li><a href="index.php?r=sub/newsother&type=board&footinfo=yes">分赛区牌匾</a></li>
                <li><a href="index.php?r=sub/newsother&type=bill&footinfo=yes">大赛海报</a></li>
            </ul>
        </div>
    <?php 
        }
    ?>
    <div style="clear:both"></div>
    <div class="photo-ad">
        <div class="ad1"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad1.png" alt=""></a></div>
        <div class="ad2"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad2.png" alt=""></a></div>
        <div class="ad3"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL ?>ad3.png" alt=""></a></div>
    </div>
    <div style="clear:both"></div>
</div>
