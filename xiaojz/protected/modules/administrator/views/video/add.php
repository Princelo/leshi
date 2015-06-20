<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加视频</title>
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
                <span style="float:left">当前位置是：视频欣赏>添加视频</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=administrator/video/show">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            
            <?php //$form = $this -> beginWidget('CActiveForm'); ?>
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'shop-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>
                        <?php echo $form -> labelEx($video_model, 'video_title') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($video_model,'video_title',array('size'=>40,'maxlength'=>40,'class'=>'abc')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($video_model, 'video_introduce') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($video_model,'video_introduce'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($video_model, 'video_youku_id') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($video_model,'video_youku_id'); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form -> labelEx($video_model, 'video_category'); ?></td>
                    <td><?php echo $form -> radioButtonList($video_model, 'video_category', array('players','news','titbits'));?></td>               
                </tr>
<tr>
<td><?php echo $form -> labelEx($video_model, 'video_pic'); ?></td>
<td><?php echo CHtml::activeFileField($video_model,'aimage'); ?></td>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            <?php $this -> endwidget(); ?>
<!--<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'shop-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<?php echo CHtml::activeFileField($video_model,'aimage'); ?>
<input type="submit" value='uploadpic' />
<?php $this->endWidget();?>-->
        </div>
    </body>
</html>
