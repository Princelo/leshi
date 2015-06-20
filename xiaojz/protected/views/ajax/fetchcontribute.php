        <ul>
                <?php
                $i=1;
                foreach($news_infos as $_v){
                ?>
                <li class="<?php echo ($i%2==0)?'even':'odd'; ?>">
                    <a class="essay" href="<?php echo SITE_URL; ?>?r=sub/newsdetail&cid=<?php echo $_v->news_id; ?>" ><?php echo $_v->news_title; ?></a>
                    <span><?php echo $_v->news_date; ?></span>
                </li>
                <?php
                    $i++;
                }
                ?>
        </ul>
    <div class="page-block">
        <div class="page-btn">
                        <?php echo $page_list; ?>
        </div>
    </div>
