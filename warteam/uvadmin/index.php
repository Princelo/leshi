<?php 
header("Content-Type:text/html;charset=utf-8");
if(isset($_GET["text"]))echo $_GET["text"];//由修改页面跳转后台页面时，显示修改成功信息
    $db=mysql_connect("localhost:3306", "root", "sise");
    $db_selected=mysql_select_db("liyajie",$db);
    $result = mysql_query("SELECT * FROM hao_lolgame_list");
    echo "<table>";
    while($rows = mysql_fetch_assoc($result)){
        $viewurl="view.php?tid={$rows["id"]}&teamname={$rows["teamname"]}&warzone={$rows["warzone"]}";
        for($i=1; $i<=7; $i++)
            $viewurl.="&member".$i."name=".$rows["member{$i}name"]."&member".$i."cd=".$rows["member{$i}cd"]."&member".$i."id=".$rows["member{$i}id"];
        echo "<tr><td value={$rows["id"]}>".$rows["id"]."</td><td>".$rows["teamname"]."</td>"
                . "<td><a href=\"{$viewurl}\">"
                . "查看</a></td><td><a href=\""."delete.php?id={$rows["id"]}\">刪除</a></td>";
        echo "<td>money:{$rows["money"]}</td></tr>";
    }
    echo "</table>";
    mysql_close($db);