        <ul class="images-show" id="images-show">
                <?php
                foreach($video_infos as $_v){
                ?>
                <li>
                    <div class="showimg"><a class="video" href="<?php echo SITE_URL; ?>?r=sub/videodetail&vid=<?php echo $_v->video_id; ?>" ><img src="images/grey.gif" data-original="<?php echo $_v->video_pic; ?>" alt="<?php echo $_v->video_title ?>"></a></div>
                    <p>
                        <a href="<?php echo SITE_URL; ?>?r=sub/videodetail&vid=<?php echo $_v->video_id; ?>" title="<?php echo $_v->video_title; ?>"><?php echo $_v->video_title ?></a>
                        <label><?php echo $_v->video_date; ?></label>
                    </p>
                </li>
                <?php
                }
                ?>
        </ul>
    <div class="page-block">
        <div class="page-btn">
                        <?php echo $page_list; ?>
        </div>
    </div>
