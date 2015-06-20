<?php $orderno = date("y").date("m").date("d").date("h").date("i").date("s").rand(100,999); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>战队报名</title>
<script src="js/validate.js"></script>
</head>



<body>
<form action="alipayapi.php" id="myform" name="myform" method="post" onsubmit="validate();">
    战队名称：<input id="teamname" name="teamname" <?php if(isset($_GET["teamname"])&&$_GET["teamname"]!="")echo "value=\"{$_GET["teamname"]}\" ";?>/> &nbsp;&nbsp;&nbsp;&nbsp;
    选择比赛时区：&nbsp;&nbsp;A<input id="warzone" value="a" type="radio" <?php if(isset($_GET["warzone"]) && strpos($_GET["warzone"],"a",0)>=1) echo " checked=\"checked\" ";?>name="warzone" />&nbsp;&nbsp;&nbsp;
    B<input <?php if(isset($_GET["warzone"])&& strpos($_GET["warzone"],"b",0)>=1) echo " checked=\"checked\" ";?>type="radio" id="warzone" name="warzone" value="b" /><br>
        <div style="display:none;">队员性别：男：<input type="radio" value="m" id="gender" name="gender" />&nbsp;&nbsp;&nbsp;女：<input value="f" type="radio" id="gender" name="gender" />（可选，选择B时区时必选，选择B时区时队员性别必须一致。）<br /></div>
    <?php
    for($i=1; $i<=7; $i++){
        $if1 = (isset($_GET["member{$i}name"])&&$_GET["member{$i}name"]!="") ? "value={$_GET["member{$i}name"]} ":"";
        $if2 = (isset($_GET["member{$i}cd"])&&$_GET["member{$i}cd"]!="") ? "value={$_GET["member{$i}cd"]} ":"";
        $if3 = (isset($_GET["member{$i}id"])&&$_GET["member{$i}id"]!="") ? "value={$_GET["member{$i}id"]} ":"";
        $if4 = (isset($_GET["member{$i}sex"])&&$_GET["member{$i}sex"]=="male")?"checked=\"checked\"":"";
        $if5 = (isset($_GET["member{$i}sex"])&&$_GET["member{$i}sex"]=="female")?"checked=\"checked\"":"";
        echo "队员{$i}：姓名：<input type=\"text\" name=\"member{$i}name\" id=\"member{$i}name\" ".$if1. " /> 身份证：<input name=\"member{$i}cd\" id=\"member{$i}cd\" " .$if2.
                " /> 游戏ID：<input name=\"member{$i}id\" id=\"member{$i}id\" ".$if3.
                        "/><br />";//队员性别：男<input type=\"radio\" ".$if4." name=\"member{$i}sex\" id=\"member1sex\" value=\"male\" />女<input type=\"radio\"" .$if5." name=\"member{$i}sex\" id=\"member{$i}sex\" value=\"female\"><br />";
    }
    ?>
    <input type="hidden" value="<?php echo $orderno;?>" name="orderno"/>
    <input type="submit" onclick="return validate();" value="<?php echo isset($_GET["tid"])?"修改队伍":"增加队伍"?>">
        <?php if(isset($_GET["tid"])) echo "<input name=\"tid\" value={$_GET["tid"]} type=\"hidden\" /><a href=\"uvadmin/index.php\">返回</a>"; ?>

</form>
</body>
</html>