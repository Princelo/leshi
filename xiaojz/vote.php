<?php
//require('GetMacAddr.php');
//$mac = new GetMacAddr(PHP_OS);
//$mac_addr = $mac->mac_addr;
$mac_addr = $_SERVER['REMOTE_ADDR'];
require('./db_connect.php');
if(mysqli_connect_errno()){
    printf("Connect failed:%s\n", mysqli_connect_error());
}
if(voteVerify($xiaojz_mysqli, $mac_addr)){
    $sql = "INSERT INTO `xiaojz`.`xiaojz_vote`(`vote_mac`,`vote_log`,`vote_user_name`,`vote_players_id`) VALUES ('{$mac_addr}','{$_COOKIE['user_name']}+@#{$_GET['players_id']}', '{$_COOKIE['user_name']}', '{$_GET['players_id']}');";
    $result = $xiaojz_mysqli->query($sql);
    $sql2 = "SELECT vote_log From xiaojz_vote WHERE vote_players_id='{$_GET['players_id']}';";
    $result2 = $xiaojz_mysqli->query($sql2);
    $votes=$result2->num_rows;
    $sql2 = "UPDATE `xiaojz`.`xiaojz_players` SET `players_vote` = '{$votes}' WHERE `xiaojz_players`.`players_id` ={$_GET['players_id']};";
    $result2 = $xiaojz_mysqli->query($sql2);
    //print_r($result); exit;
    if(($result==1) && ($result2==1)){
        //echo "<script>alert(\"投票成功！\");history.go(-1);</script>";exit;
        header('Location: votesuccess.php');exit;
    }
}
function voteVerify($mysqli, $mac_addr)
{
    if(!isset($_COOKIE['user_name'])){
        //echo "<script>alert(\"你尚未登录\");history.go(-1);</script>";exit;
        header('Location: notlogin.php');exit;
    }
    $sql = "SELECT vote_mac FROM xiaojz_vote WHERE vote_mac='{$mac_addr}';";
    $result = $mysqli->query($sql);
    if($result->num_rows>=3){
        //echo "<script>alert(\"你的投票次数超过了限制\");history.go(-1);</script>";exit;
        header('Location: macerror.php');exit;
    }
    $sql = "SELECT vote_user_name FROM xiaojz_vote WHERE vote_user_name='{$_COOKIE['user_name']}'";
    $result = $mysqli->query($sql);
    if($result->num_rows>=3){
        header('Location: macerror.php');exit;
    }
    $sql = "SELECT vote_log FROM xiaojz_vote WHERE vote_log='{$_COOKIE['user_name']}+@#{$_GET['players_id']}';";
    $result = $mysqli->query($sql);
    //echo $result->num_rows;exit;
    if($result->num_rows>=1){
        //echo "<script>alert(\"你已对该名选手投过票！\");history.go(-1);</script>";exit;
        header('Location: voted.php');exit;
    }
    return true;
}
