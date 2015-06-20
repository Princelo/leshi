<?php
$paraOfMembers = "";
$orderno = $_POST["orderno"];
$wid_subject = $_POST["teamname"];

$widtotal_fee = 100;
$members = $_POST["member1name"];
for($i=2; $i<=numOfMembers(); $i++)
   $members.="|{$_POST["member{$i}name"]}";
$widbody = $_POST["teamname"].",". $members.",".numOfMembers();
for($i=1; $i<=numOfMembers(); $i++)
   $paraOfMembers.="&member{$i}name={$_POST["member{$i}name"]}";


header("Content-Type:text/html;charset=utf-8");
$db = connectDB("liyajie");
//check();

$num = numOfMembers();
addTeam();



function numOfMembers()
{
    $numOfMembers = 0;
    for($i=1; $i<=7; $i++){
        if(isset($_POST["member{$i}name"]) && $_POST["member{$i}name"] != "")
          $numOfMembers++;
    }
    //echo $numOfMembers;exit();
    return $numOfMembers;
}

function getWarZone(){
    $warzone = "z";
    $warzone.=$_POST['warzone'];
    return $warzone;
}

function addTeam(){
    $money = (isFree())?"f":"n";
    $thisorderno = $_POST["orderno"];
    $numOfMembers = numOfMembers();
    $addTeamSql="INSERT INTO hao_lolgame_list (teamname, warzone, orderno, money";
    $memberSql = "";
    $warzone = getWarZone();
    
    $valuesSql = ") VALUES ('{$_POST['teamname']}', '{$warzone}', '{$thisorderno}' ,'{$money}'";
    for($i=1; $i<=$numOfMembers; $i++)
        $memberSql.=",member{$i}name, member{$i}cd, member{$i}id, member{$i}sex";
    for($i=1; $i<=$numOfMembers; $i++)
        $gender[$i]=($_POST["member{$i}cd"]{16}%2==0)?"f":"m";
    for($i=1; $i<=$numOfMembers; $i++)
        $valuesSql .= ",'{$_POST["member{$i}name"]}', '{$_POST["member{$i}cd"]}', '{$_POST["member{$i}id"]}', '{$gender[$i]}'";
    
    $sql = $addTeamSql . $memberSql . $valuesSql . ");";
    //echo $sql;exit();
    mysql_query($sql);

    if(mysql_affected_rows()==1){
        //echo $free;exit();
        if(isFree()){
            echo "<script language=\"javascript\">alert(\"报名成功！\");location.href = 'index.php';</script>";
            //Header("Location:"."index.php");
        }
    }
    else{
        echo "报名失败";
        echo "<script language=\"javascript\">alert(\"报名失败，请从新提交！\");location.href = 'javascript:history.back()';</script>";
    }    
}

function connectDB($dbname){
    $db=mysql_connect("localhost:3306", "root", "sise");
    $db_selected=mysql_select_db($dbname,$db);
    return $db;
}
function isFree(){
    if($_POST["warzone"]=='b')
        if($_POST["member1cd"]{16}%2==0)
            return true;

    return false;     
}

function check(){
    if ($_POST['warzone']=='za'&&($_POST['teamname'] == ""|| $_POST['member1name'] =="" || $_POST['member1cd'] == "" || $_POST['member1id'] == ""|| 
            $_POST['member2name'] =="" || $_POST['member2cd'] == "" || $_POST['member2id'] == ""|| $_POST['member3name'] =="" || $_POST['member3cd'] == "" 
            || $_POST['member3id'] == ""|| $_POST['member4name'] =="" || $_POST['member4cd'] == "" || $_POST['member4id'] == ""|| 
            $_POST['member5name'] =="" || $_POST['member5cd'] == "" || $_POST['member5id'] == "")){
      echo "输入信息不完整，请完整输入战队名称、比赛时区、A赛时区需填写五名以上队员信息";exit();
    }
    if ($_POST['warzone']!='za' && $_POST['warzone']!='zb'){
        echo "请选择比赛时区";exit();
    }
    if($_POST['teamname'] == ""|| $_POST['member1name'] =="" || $_POST['member1cd'] == "" || $_POST['member1id'] == ""){
      echo "输入信息不完整，请完整输入战队名称、比赛时区、A赛时区需填写五名以上队员信息、B时区需填写一名以上队员信息!";
      exit();
   }
   if(($_POST['member1name'] != ""||$_POST['member1cd'] != ""||$_POST['member1id']!="")){
        if($_POST['member1name']=="" || $_POST['member1cd']=="" || $_POST['member1id']=="")
            {echo '第一名队员信息不完整';exit();}
   }
   if(($_POST['member2name'] != ""||$_POST['member2cd'] != ""||$_POST['member2id']!="")){
        if($_POST['member2name']=="" || $_POST['member2cd']=="" || $_POST['member2id']=="")
            {echo '第二名队员信息不完整';exit();}
   }
   if(($_POST['member3name'] != ""||$_POST['member3cd'] != ""||$_POST['member3id']!="")){
        if($_POST['member3name']=="" || $_POST['member3cd']=="" || $_POST['member3id']=="")
            {echo '第三名队员信息不完整';exit();}
   }
   if(($_POST['member4name'] != ""||$_POST['member4cd'] != ""||$_POST['member4id']!="")){
        if($_POST['member4name']=="" || $_POST['member4cd']=="" || $_POST['member4id']=="")
            {echo '第四名队员信息不完整';exit();}
   }
   if(($_POST['member5name'] != ""||$_POST['member5cd'] != ""||$_POST['member5id']!="")){
        if($_POST['member5name']=="" || $_POST['member5cd']=="" || $_POST['member5id']=="")
            {echo '第五名队员信息不完整';exit();}
   }
   if(($_POST['member6name'] != ""||$_POST['member6cd'] != ""||$_POST['member6id']!="")){
        if($_POST['member6name']=="" || $_POST['member6cd']=="" || $_POST['member6id']=="")
            {echo '第六名队员信息不完整';exit();}
   }
   if(($_POST['member7name'] != ""||$_POST['member7cd'] != ""||$_POST['member7id']!="")){
        if($_POST['member7name']=="" || $_POST['member7cd']=="" || $_POST['member7id']=="")
            {echo '第七名队员信息不完整';exit();}
   }
}
?>