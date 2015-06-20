<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加文章</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo B_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <div>
        <?php 
            if(Yii::app()->user->hasFlash('success')){
                echo Yii::app()->user->getFlash('success');
            }
        ?>
        </div>
        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：新闻中心>赛事公告</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=administrator/news/showannouncement">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            
            <?php $form = $this -> beginWidget('CActiveForm'); ?>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>
                        <?php echo $form -> labelEx($news_model, 'news_title') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($news_model,'news_title',array('size'=>40,'maxlength'=>40,'class'=>'abc')); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form -> labelEx($news_model, 'news_content'); ?></td>
                    <td><?php $this->widget('application.extensions.fckeditor.FCKEditorWidget', array("model" => $news_model, "attribute"=>'news_content', "height"=>'500px', "width"=>'100%','fckeditor'=>Yii::app()->basePath.'/../fckeditor/fckeditor.php','fckBasePath'=>Yii::app()->baseUrl.'/fckeditor/', )); ?></td> 
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            <?php $this -> endwidget(); ?>
        </div>
    </body>
</html>
