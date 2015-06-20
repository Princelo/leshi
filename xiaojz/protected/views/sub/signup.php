<?php 
if(!isset($_COOKIE['user_name']))
    header('Location: notlogin.php');
//print_r($players_register_infos);

require('./db_connect.php');
if(isset($_COOKIE['user_name'])){
    $result=$xiaojz_mysqli->query("SELECT * FROM `xiaojz`.`xiaojz_players` WHERE `players_user_name`='{$_COOKIE['user_name']}';");
    if($result->num_rows>0)
        header('Location: '.SITE_URL.'?r=sub/formedit');
}
//echo $result->num_rows;exit;
?>
<style type="text/css">
.login-form {
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 11px;
    box-shadow: 0 0 11px #CCCCCC;
    /*margin-top: 10px;*/
    padding: 10px;
    width: 1129px;
    text-align:center;
    margin:0 auto;
    margin-top:10px;
}
</style>
<div style="clear:both"></div>
<div class="login-form">
    <div style="color:#666666;font-size:24px;margin:0 15px; padding:25px 0 15px 45px; text-align:center; ">报名信息</div>
<div class="signup-form">
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'shop-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
            <table width="50%" class="table_a">
                <tr>
                    <td>
                        <?php echo $form -> labelEx($players_model, 'players_name') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($players_model,'players_name',array('size'=>30,'maxlength'=>20,'class'=>'abc')); ?>
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
                        <?php echo $form -> labelEx($players_model, 'players_tel') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_tel',array('cols'=>30,'rows'=>5)); ?>
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
                        <?php echo $form -> labelEx($players_model, 'players_school') ?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($players_model,'players_school',array('cols'=>30,'rows'=>5)); ?>
                    </td>
                </tr>
                
<tr>
<td><?php echo $form -> labelEx($players_model, 'players_big_img'); ?></td>
<td><?php echo CHtml::activeFileField($players_model,'aimage'); ?></td>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="提交报名信息">
                    </td>
                </tr>  
            </table>
            <?php $this -> endwidget(); ?>
<!--<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'shop-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<?php echo CHtml::activeFileField($players_model,'aimage'); ?>
<input type="submit" value='uploadpic' />
<?php $this->endWidget();?>-->
</div>
