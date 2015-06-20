<?php

include("db_connect.php");
$xiaojz_mysqli->query("alter table xiaojz_news modify column news_title varchar(100) ;");

