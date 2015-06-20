

                <div class="box">
                    <div class="box_1">
                        <form name="compareForm" action="compare.php" method="post" onsubmit="return compareGoods(this);">
                            <div class="clearfix goodsBox" style="border: medium none; padding: 11px 0pt 10px 5px;">
                                <!--片段缓存 实现-->
                                <?php
                                /*if($this->beginCache('缓存名称')){
                                 * duration 设置过期时间
                                 * varyByParam 缓存变化
                                 * dependency 缓存依赖
                                 */
                                /*if($this->beginCache('goods',array(
                                    'duration'=>3600,
                                    'varyByParam' => array('page'),
                                    'dependency' =>array(
                                        'class'=>'system.caching.dependencies.CDbCacheDependency',
                                        'sql'=>'select sum(goods_price) from {{goods}}',
                                    )
                                ))){
                                 * 
                                 */
                                ?>
                                <?php
                                foreach($players_infos as $_v){
                                ?>
                                <div class="goodsItem">
                                    <a href="./index.php?r=players/detail&id=<?php echo $_v->players_id ?>" target="_blank"><img src="<?php echo $_v->players_big_img; ?>" alt="<?php echo $_v->players_name ?>" class="goodsimg"></a><br />
                                    <p><a href="#" title="诺基亚N85"><?php echo $_v->players_name ?></a></p>
                                    <font class="market_s">￥<?php echo $_v->players_price ?>元</font><br />
                                    <font class="shop_s">￥<?php echo $_v->players_price ?>元</font><br />
                                    <a href="#"><img src="<?php echo IMG_URL; ?>goumai.gif"></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#"><img src="<?php echo IMG_URL; ?>shoucang.gif"></a>
                                </div>
                                <?php
                                }
                                ?>
                                <?php //$this -> endCache();} ?>
                                
                                
                            </div>
                        </form>

                    </div>
                </div>
                <div class="blank5"></div>
                    <div>
                        <?php echo $page_list; ?>
                    </div>
            </div>  

        </div>

        </div>

       
