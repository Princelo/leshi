<?php
//if(isset($_COOKIE['user_name']))
//echo $_COOKIE['user_name'];
?><div class="home-main">
<div class="banner-bg"></div>
<div class="laser-bg"></div>
</div>
<div class="home-body">
<div class="bann-content">
  <div class="product-slide">
    <div class="product-img-box">
            <div class="media-head">
        <p class="product-image">
        <a alt="" target="_blank" href=""><img title="" border="0" src="<?php echo UPLOADS_URL; ?>bann1.jpg" width="979px" height="350px"></a>
        </p>
        <div class="product-shop">
        </div>
        <div class="clear">
        </div>
      </div>
            <div class="media-head">
        <p class="product-image">
          <a alt="" target="_blank" href=""><img title="" border="0" src="<?php echo UPLOADS_URL; ?>bann2.jpg" width="979px" height="350px"></a>
        </p>
        <div class="product-shop">
        </div>
        <div class="clear">
        </div>
      </div>
            <div class="media-head">
        <p class="product-image">
          <a alt="" target="_blank" href="/"><img title="" border="0" src="<?php echo UPLOADS_URL; ?>bann3.jpg" width="979px" height="350px"></a>
        </p>
        <div class="product-shop">
        </div>
        <div class="clear">
        </div>
      </div>
        <div class="media-head">
        <p class="product-image">
        <a alt="" target="_blank" href=""><img title="" border="0" src="<?php echo UPLOADS_URL; ?>bann4.jpg" width="979px" height="350px"></a>
        </p>
        <div class="product-shop">
        </div>
        <div class="clear">
        </div>
      </div>
        <div class="media-head">
        <p class="product-image">
        <a alt="" target="_blank" href=""><img title="" border="0" src="<?php echo UPLOADS_URL; ?>bann5.jpg" width="979px" height="350px"></a>
        </p>
        <div class="product-shop">
        </div>
        <div class="clear">
        </div>
      </div>
          </div>
    <div class="banner-right">
    </div>
    <div class="product-img-box banner-more">
      <div class=" more-views">
        <div class="more-left">
          <span>left</span>
        </div>
        <div class="move-content nubmer-bar">
          <ul>
                        <li class="item0">
              <div class="ico-img">
              </div>
            </li>
                        <li class="item1">
              <div class="ico-img">
              </div>
            </li>
                        <li class="item2">
              <div class="ico-img">
              </div>
            </li>
                        <li class="item3">
              <div class="ico-img">
              </div>
            </li>
                        <li class="item4">
              <div class="ico-img">
              </div>
            </li>
                      </ul>
        </div>
        <div class="more-right">
          <span>right</span>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
		    jQuery(function(){
		        jQuery.bestnwSlider({
		            baseUrl: "/",
		            hasGallery: 0,
		            hasArrow: 1,
		            barType : 2,
		            speed : 500,
			    	autoSpeed:5000,
		            preText:'left',
		            nextText: 'right'
		        });
		    });
		</script>
</div>
<!--left-->
<div class="team1andnews">
    <div id="team1" class="team1">
        <p class="teamtitle team1title">
            <span>选手风采</span>
            <a href="index.php?r=sub/photo" class="nextteam">更多</a>
        </p>
        <div class="team1content">
            <ul id="images-show">

                <?php
                foreach($photo_infos as $_v){
                ?>
                <li>
                    <div class="showimg"><a class="pic" href="<?php echo SITE_URL.$_v->photo_big_img; ?>" ><img src="images/grey.gif" data-original="<?php echo $_v->photo_small_img; ?>" alt="<?php echo $_v->photo_desc ?>"></a></div>
                    <p>
                        <a href="<?php echo $_v->photo_big_img; ?>" title="<?php echo $_v->photo_desc; ?>"><?php echo $_v->photo_desc ?></a>
                        <label><?php echo $_v->photo_date; ?></label>
                    </p>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="newscenter">
        <p class="newstitle">
        <span>新闻中心</span>
        <a href="<?php echo SITE_URL; ?>?r=sub/news" class="more">更多</a>
        </p>
        <div class="newscontent">
            <ul>
                <?php
                foreach($news_infos as $_v){
                ?>
                <li>
                    <a title="<?php echo $_v->news_title; ?>" href="<?php echo SITE_URL; ?>?r=sub/newsdetail&cid=<?php echo $_v->news_id; ?>" ><?php echo (mb_strlen($_v->news_title)>39)?mb_substr($_v->news_title, 0, 13, 'utf-8')."...":$_v->news_title; ?></a>
                </li>
                <?php
                }
                ?>
            </ul>
            <a class="illsignup" href="<?php echo SITE_URL.'?r=sub/signup';?>"></a>
        </div>
    </div>
</div>
<div class="team2andteam3">
    <div class="team2">
        <p class="teamtitle team2title">
        <span>赛事最新公告</span>
        <a href="<?php echo SITE_URL.'?r=sub/announcement'; ?>" class="nextteam">更多</a>
        </p>
        <div class="team2content">
            <ul><?php $i = 1; ?>
                <?php foreach($announcement_infos as $_v){ ?>
                <li class="<?php echo ($i%2==0)?'even':'odd'; ?>">
                    <a title="<?php echo $_v->news_title; ?>" href="<?php echo SITE_URL.'?r=sub/newsdetail&cid='.$_v->news_id; ?>"><?php echo (mb_strlen($_v->news_title)>60)? mb_substr($_v->news_title, 0, 20, 'utf-8')."...":$_v->news_title; ?></a>
                    <span><?php echo $_v->news_date; ?></span>
                </li>
                <?php $i++ ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="team3">
        <p class="teamtitle team3title">
        <span>精彩花絮</span>
        <a href="<?php echo SITE_URL.'?r=sub/videotitbits'; ?>" class="more">更多</a>
        </p>
        <div class="team3content">
            <div class="index-video">
                <embed style="position:relative; top:19px; left:24px;" height="275" width="490" align="middle" src="http://static.youku.com/v/swf/qplayer.swf?VideoIDS=<?php echo $video_youku_id; ?>=&isAutoPlay=false&isShowRelatedVideo=false&embedid=-&showAd=0" quality="high" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash">
            </div>
        </div>
    </div>
</div>
<div class="mini-banner"><a href=""><img src="images/grey.gif" data-original="<?php echo UPLOADS_URL; ?>mini-banner.jpg" alt="" /></a></div>
</div>
</div>
