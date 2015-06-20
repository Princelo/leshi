<?php
if(isset($user_name)){
    setcookie('user_name',$user_name,time()+3600);
    header('Location:'.SITE_URL);exit;
}
if(isset($_COOKIE['user_name']))
{
    header('Location:'.SITE_URL);exit;
}
    //定义面包屑变量
    $this -> breadcrumbs = array(
        '用户中心'=>array('user/center'),
        '用户注册'=>array('user/register'),
    );
?>
<!--放入view具体内容-->
<style type="text/css">
    div .errorMessage{color:red;}
    label  .required {color:red;}
.register-form {
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
    text-align:center;
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
.field .hint {
    margin-left: 0;
    padding-left: 90px;
}
.field .hint {
    clear: left;
    color: #989898;
    float: left;
    font-size: 12px;
    margin-left: 12px;
    width: 300px;
}
.reg-submit-btn {
    background: url("http://leshi1.com/app/Tpl/fanwe/images/user_rl.gif") no-repeat scroll 0 -50px rgba(0, 0, 0, 0);
    border: medium none;
    cursor: pointer;
    display: block;
    height: 50px;
    overflow: hidden;
    text-indent: -200em;
    width: 158px;
    position:relative;
    left:370px;
}
.inputBg{position:relative; top:-3px; height:20px; line-height:20px; padding:5px 10px;}
.field > img{position:relative; top:5px;}
</style>
<div style="clear:both"></div>
<div class="register-form">
    <div class="user_inc_top">新会员注册</div>
        <?php $form = $this -> beginWidget('CActiveForm',
                    array(
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                            ),
                    )
                ); 
        ?>
                <div class="field email">
                    <label for="signup-email-address">电子邮箱</label>
                    <?php echo $form->textField($user_model,'email',array('class'=>'f-input ipttxt','id'=>'User_user_email')); ?>
                    <?php echo $form->error($user_model,'email'); ?>
                    <span class="f-input-tip"></span> 
                    <span class="hint">登录及找回密码用，不会公开</span> 
                </div>
                <div class="blank1"></div>
                <div class="field username">
                    <?php echo $form->labelEx($user_model, 'user_name'); ?>
                    <?php echo $form->textField($user_model,'user_name',array('class'=>'f-input ipttxt','id'=>'User_user_name')); ?>
                    <?php echo $form ->error($user_model,'user_name'); ?>
                    <span class="f-input-tip"></span> 
                    <span class="hint">3-15个字符，一个汉字为两个字符</span> 
                </div>
                <div class="blank1"></div>
                <div class="field password">
                    <?php echo $form->labelEx($user_model, 'user_pwd'); ?>
                    <?php echo $form->passwordField($user_model,'user_pwd',array('class'=>'f-input ipttxt','id'=>'User_password')); ?>
                    <?php echo $form ->error($user_model,'user_pwd'); ?>
                    <span class="f-input-tip"></span> 
                    <span class="hint">最少 4 个字符 </span> 
                </div>
                <div class="blank1"></div>
                <div class="field password">
                    <?php echo $form->label($user_model,'user_pwd2') ?>
                    <?php echo $form->passwordField($user_model,'user_pwd2',array('class'=>'f-input ipttxt','id'=>'User_password2')); ?>
                    <?php echo $form ->error($user_model,'user_pwd2'); ?>
                    <span class="f-input-tip"></span> 
                </div>
                <div class="blank1"></div>
                <div class="field mobile">
                    <label for="signup-mobile">手机号码</label>
                    <?php echo $form->textField($user_model,'mobile',array('class'=>'f-input ipttxt','id'=>'User_user_tel','maxlength'=>11)); ?>
                    <?php echo $form->error($user_model,'mobile'); ?>
                    <span class="f-input-tip"></span> 
                    <!--<span class="hint"> 团购券将通过短信发到手机上</span>-->
                </div>          
                <div class="blank1"></div>
                <div class="blank"></div>
                <div class="act">
                    <input type="submit" class="reg-submit-btn" id="signup-submit" name="commit" value="注册">              
                </div>
        <?php $this->endWidget(); ?>
</div>
