<?php
header("Content-Type:text/html;charset=utf-8");
$db = connectDB("liyajie");

$num = numOfMembers();

change();

function change(){
    $gender = "u";
    $warzone = getWarZone();
//    if(isset($_GET['gender'])){
//        $gender = $_GET["gender"];
//    }
    $result = mysql_query("SELECT money FROM hao_lolgame_list WHERE id = '{$_GET["tid"]}'");
    $row = mysql_fetch_assoc($result);
    $genderchange="";
    if($_GET["warzone"]=='b')
        if($_GET["member1cd"]{16}%2==0)
            if($row["money"]=='n')
                $genderchange=", money='f' ";
        
    $updateSql="UPDATE hao_lolgame_list SET teamname='{$_GET['teamname']}', warzone='{$warzone}' ".$genderchange;
    for($i=1; $i<=7; $i++)
        $updateSql.=",member".$i."name='{$_GET["member{$i}name"]}'".",member".$i."cd='{$_GET["member{$i}cd"]}'".",member".$i."id='{$_GET["member{$i}id"]}'";
    $updateSql.=" WHERE ID = {$_GET["tid"]};";
    mysql_query($updateSql);
    if(mysql_affected_rows()==1){
    echo "修改成功";
    Header("Location:"."index.php?text=修改成功");
    }else
    echo "修改失败";
}

function numOfMembers()
{
    $numOfMembers = 0;
    for($i=1; $i<=7; $i++){
        if(isset($_GET["member{$i}name"]) && $_GET["member{$i}name"] != "")
          $numOfMembers++;
    }
    return $numOfMembers;
}

function getWarZone(){
    $warzone = "z";
    $warzone .= $_GET['warzone'];
    return $warzone;
}

function connectDB($dbname){
    $db=mysql_connect("localhost:3306", "root", "sise");
    $db_selected=mysql_select_db($dbname,$db);
    return $db;
}
?>