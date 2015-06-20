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
                <span style="float: left;">当前位置是：赛事公告>赛事公告列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=administrator/news/addannouncement">【添加文章】</a>
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
        <div class="div_search">
            <span>
                
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>新闻标题</td>
                        <!--<td>新闻內容</td>-->
                        <td>最后修改时间</td>
                        <td align="center">操作</td>
                    </tr>
                    
                    <?php
                    //遍历传递过来的商品变量值$news_infos
                    $i=1;
                    foreach($news_infos as $_v){
                    ?>
                    <tr id="product1">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $_v->news_title; ?></td>
                        <!--<td><?php //echo $_v->news_content; ?></td>-->
                        <td><?php echo $_v->news_date ?></td>
                        <td><a href="./index.php?r=administrator/news/updateannouncement&id=<?php echo $_v->news_id; ?>">修改</a></td>
                        <td><a href="./index.php?r=administrator/news/delannouncement&id=<?php echo $_v->news_id; ?>">删除</a></td>
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
