        <ul class="images-show vote-show" id="images-show">
                <?php
                foreach($players_infos as $_v){
                ?>
                <li>
                    <div class="showimg voteimg"><a class="pic" href="<?php echo SITE_URL.$_v->players_big_img; ?>" ><img src="images/grey.gif" data-original="<?php echo $_v->players_small_img; ?>" alt="<?php echo $_v->players_name ?>"></a></div>
                    <p>
                        <label><?php echo ($_v->players_vote>0)?$_v->players_vote:0; ?>票</label>
                        <a class="vote-btn" href="<?php echo SITE_URL;?>vote.php?players_id=<?php echo $_v->players_id;?>"></a>
                        <span><?php echo $_v->players_name ?></span>
                    </p>
                </li>
                <?php
                }
                ?>
        </ul>
        <input value="5" type="hidden" id="which-vote" />
    <div class="page-block">
        <div class="page-btn">
                        <?php echo $page_list; ?>
        </div>
    </div>
