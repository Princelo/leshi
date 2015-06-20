        <ul class="images-show" id="images-show">
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
    <div class="page-block">
        <div class="page-btn">
                        <?php echo $page_list; ?>
        </div>
    </div>
