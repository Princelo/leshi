<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo B_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：选手管理>修改选手信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=administrator/players/show">【返回】</a>
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
                        <?php echo $form -> labelEx($players_model, 'players_name') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($players_model,'players_name',array('size'=>40,'maxlength'=>40,'class'=>'abc')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_introduce') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_introduce',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_school') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_school',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
<tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_parents') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_parents',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
<tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_user_name') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_user_name',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
<tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_tel') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_tel',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
<tr>
<td><?php echo $form -> labelEx($players_model, 'players_big_img'); ?></td>
<td><?php echo CHtml::activeFileField($players_model,'aimage'); ?></td>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            <?php $this -> endwidget(); ?>
        </div>
    </body>
</html>
