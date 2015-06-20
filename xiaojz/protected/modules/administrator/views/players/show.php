<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="<?php echo B_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：选手管理>选手列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=administrator/players/add">【增加选手】</a>
                </span>
            </span>
        </div>
        <div>
            <?php
                //判断是否有提示信息
                if(Yii::app()->user->hasFlash('success')){
                    echo Yii::app()->user->getFlash('success');
                }
            ?>
        </div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>选手名称</td>
                        <td>选手介绍</td>
                        <td>所得票数</td>
                        <td>原始图</td>
                        <td>缩略图</td>
                        <td>联系电话</td>
                        <td>监护人</td>
                        <td>学校班级</td>
                        <td>报名帐号</td>
                        <td>缩略图裁剪</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                    
                    <?php
                    //遍历传递过来的商品变量值$players_infos
                    $i=1;
                    foreach($players_infos as $_v){
                    ?>
                    <tr id="product1">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $_v->players_name; ?></td>
                        <td><?php echo $_v->players_introduce; ?></td>
                        <td><?php echo $_v -> players_vote; ?></td>
                        <td><img src="<?php echo $_v->players_big_img; ?>" height="100" /></td>
                        <td><img src="<?php echo $_v -> players_small_img; ?>" height="75" width="55" /></td>
                        <td><?php echo $_v -> players_tel; ?></td>
                        <td><?php echo $_v -> players_parents; ?></td>
                        <td><?php echo $_v -> players_school; ?></td>
                        <td><?php echo $_v -> players_user_name; ?></td>
                        <td><?php echo ($_v -> is_cut=='1')?'yes':'no'; ?></td>
                        <td><?php echo $_v -> players_create_time; ?></td>
                        <td><a href="./index.php?r=administrator/players/update&id=<?php echo $_v->players_id; ?>">修改</a></td>
                        <td><a href="./index.php?r=administrator/players/del&id=<?php echo $_v->players_id; ?>">删除</a></td>
                    </tr>
                    <?php  
                        $i++;
                    }
                    ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo $page_list; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
