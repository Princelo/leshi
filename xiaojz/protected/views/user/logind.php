<?php
    if(isset($user_name)){
        setcookie('user_name', $user_name, time()+3600);
        header('Location: '.SITE_URL);exit;
    }
if(isset($_COOKIE['user_name']))
{
    header('Location: '.SITE_URL);exit;
}
    //定义面包屑变量
    $this -> breadcrumbs = array(
        '用户中心'=>array('user/center'),
        '用户登录'=>array('user/login'),
    );
?>

<style type="text/css">
    div .errorMessage{color:red;}
    label  .required {color:red;}
</style>

            <div class="block box">
            <div class="usBox clearfix">
                <div class="usBox_1 f_l">
                    <div class="logtitle"></div>
                    <?php $form = $this -> beginWidget('CActiveForm'); ?>
                        <table align="left" border="0" cellpadding="3" cellspacing="5" width="100%">
                            <tbody><tr>
                                    <td align="right" width="25%">
                                        <?php echo $form->labelEx($user_login,'user_name'); ?>
                                    </td>
                                    <td width="75%">
                                        <?php echo $form->textField($user_login,'user_name',array('size'=>25,'class'=>'inputBg')); ?>
                                        <?php echo $form->error($user_login,'user_name'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <?php echo $form->labelEx($user_login,'user_pwd'); ?>
                                    </td>
                                    <td>
                                        <?php echo $form->textField($user_login,'user_pwd',array('size'=>15,'class'=>'inputBg')); ?>
                                        <?php echo $form->error($user_login,'user_pwd'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <?php echo $form->labelEx($user_login, 'verifyCode'); ?>
                                    </td>
                                    <td>
                                        <?php echo $form->textField($user_login, 'verifyCode',array('size'=>15,'class'=>'inputBg','maxlength'=>10)); ?>
                                        <!--显示验证码图片/使用小物件显示验证码-->
                                        <?php $this -> widget('CCaptcha'); ?>
                                        <?php echo $form->error($user_login,'verifyCode'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <?php echo $form->checkBox($user_login, 'rememberMe'); ?>
                                    </td>
                                    <td>
                                        <?php echo $form->labelEx($user_login, 'rememberMe'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <input name="submit" value="" class="us_Submit" type="submit" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php $this->endWidget(); ?>
                    <div class="blank"></div>
                </div>
            </div>
            </div>
            </div>
            
