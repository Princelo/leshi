<?php
$db=mysql_connect("localhost:3306", "root", "sise");
$db_selected=mysql_select_db("liyajie",$db);
if(isset($_GET['id'])){
    mysql_query("DELETE FROM hao_lolgame_list
WHERE id = '{$_GET["id"]}';");
Header("Location:"."index.php");
}
?>