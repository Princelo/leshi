<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加相册</title>
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
                <span style="float:left">当前位置是：精彩瞬间>选手风采</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=administrator/photo/show">【返回】</a>
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
                        <?php echo $form -> labelEx($photo_model, 'photo_desc') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($photo_model,'photo_desc',array('size'=>40,'maxlength'=>40,'class'=>'abc')); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form -> labelEx($photo_model, 'photo_category'); ?></td>
                    <td><?php echo $form -> radioButtonList($photo_model, 'photo_category', array('1','2','3','4'));?></td>               
                </tr>
                <tr>
                    <td><?php echo $form -> labelEx($photo_model, 'battle'); ?></td>
                    <td><?php echo $form -> radioButtonList($photo_model, 'battle', array('选手风采','比赛瞬间'));?></td>               
                </tr>
<tr>
<td><?php echo $form -> labelEx($photo_model, 'photo_big_img'); ?></td>
<td><?php echo CHtml::activeFileField($photo_model,'aimage'); ?></td>
                
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
<?php echo CHtml::activeFileField($photo_model,'aimage'); ?>
<input type="submit" value='uploadpic' />
<?php $this->endWidget();?>-->
        </div>
    </body>
</html>
