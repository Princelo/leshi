<?php
    //定义面包屑变量
    $this -> breadcrumbs = array(
        '用户中心'=>array('user/center'),
        '用户登录'=>array('user/login'),
    );
?>

<style type="text/css">
    div .errorMessage{color:red;}
    label  .required {color:red;}
.login-form {
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 11px;
    box-shadow: 0 0 11px #CCCCCC;
    /*margin-top: 10px;*/
    padding: 10px;
    width: 1129px;
    text-align:center;
}
.user_inc_top {
    color: #666666;
    font-family: "微软雅黑","黑体";
    font-size: 24px;
    margin: 0 15px;
    padding: 25px 0 15px 45px;
}
.user_inc_top span {
    font-size: 18px;
    position: relative;
    top: 2px;
}
 .field {
    clear: both;
    display: block;
    float: none;
    overflow: hidden;
    text-align: left;
}
.field {
    clear: left;
    float: left;
    margin: 5px auto 10px;
    padding: 0 10px 2px;
    position:relative;
    left:360px;
}

.field label {
    color: #687278;
    float: left;
    font-size: 14px;
    height: 30px;
    line-height: 30px;
    padding-right: 20px;
    text-align: right;
    width: 80px;
}
.field label {
    height: 40px;
    line-height: 40px;
}

.field input.ipttxt {
    background: none repeat scroll 0 0 #FAFAFA;
    font-family: Arial;
    font-weight: bolder;
    height: 20px;
    line-height: 20px;
    padding: 5px 10px;
}
.field .f-input {
    float: left;
    margin: 3px 0 0;
    width: 250px;
}
.f-input {
    border: 1px solid #CCCCCC;
    font-size: 14px;
    padding: 3px 4px;
}
span.lostpassword {
    line-height: 40px;
}
span.lostpassword a {
    color: #00A9E2;
    font-size: 12px;
}
.autologin {
    font-size: 12px;
}
.autologin {
    margin-left: 90px;
    margin-top: 0;
    padding-bottom: 0;
    width: 200px;
}
form .act {
    clear: left;
    margin-left: 90px;
    padding: 0 10px;
    /*position:relative;
    left:370px;*/
}
.login-submit-btn {
    background: url("http://leshi1.com/app/Tpl/fanwe/images/user_rl.gif") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    cursor: pointer;
    float: left;
    height: 33px;
    overflow: hidden;
    text-indent: -100em;
    width: 95px;
}
.inputBg{position:relative; top:-3px; height:20px; line-height:20px; padding:5px 10px;}
.field > img{position:relative; top:5px;}
</style>
<div style="clear:both"></div>
<div class="login-form">
<div style="color:#687278;" class="user_inc_top">会员登录 <span>&nbsp;或者 <a href="<?php echo SITE_URL; ?>?r=user/register">注册</a></span>   </div>
                    <?php $form = $this -> beginWidget('CActiveForm'); ?>
                                <div class="field email">
                                    <?php echo $form->labelEx($user_login,'user_name'); ?>
                                    <?php echo $form->textField($user_login,'user_name',array('size'=>25,'class'=>'f-input ipttxt')); ?>
                                    <?php echo $form->error($user_login,'user_name'); ?>
                                </div>
                                <div class="field password">
                                    <?php echo $form->labelEx($user_login,'user_pwd'); ?>
                                    <?php echo $form->passwordField($user_login,'user_pwd',array('size'=>15,'class'=>'f-input ipttxt')); ?>
                                    <?php echo $form->error($user_login,'user_pwd'); ?>
                                    <span class="lostpassword">&nbsp;&nbsp;<a href="http://leshi1.com/index.php?ctl=user&act=getpassword">忘记密码?</a></span>
                                </div>
                                <div class="field">
                                    <?php echo $form->labelEx($user_login, 'verifyCode'); ?>
                                    <?php echo $form->textField($user_login, 'verifyCode',array('size'=>15,'class'=>'f-input ipttxt','maxlength'=>9)); ?>
                                    <!--显示验证码图片/使用小物件显示验证码-->
                                    <?php 
$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))); ?>
                                    <?php echo $form->error($user_login,'verifyCode'); ?>
                                </div>
                                <div class="field autologin">
                                    <?php echo $form->checkBox($user_login, 'rememberMe'); ?>
                                    <span>下次自动登录</span>
                                </div>
                                <div class="clear"></div>
                                
                                <div class="act">
                                    <input type="hidden" name="ajax" value="1">
                                    <input style="position:relative; left:370px;" type="submit" class="login-submit-btn" id="user-login-submit" name="commit" value="登录">
                                </div>
                    <?php $this->endWidget(); ?>
<div style="clear:both;"></div>
</div>
                    <div style="clear:both;"></div>
            
