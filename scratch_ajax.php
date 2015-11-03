<?php
/**
 * Created by PhpStorm.
 * User: Princelo
 * Date: 11/3/15
 * Time: 14:23
 */
error_reporting(0);
$uid = intval($_POST['uid']);
$type = $_POST['type'];
$dbh = new PDO('mysql:host=localhost;dbname=leshi', "leshi", "vidagdi");

if ($type == 'exchange') {
    $query = <<<QUERY
    update fanwe_scratch_bonus set is_exchanged = 1 where user_id = :uid
QUERY;
    $statement = $dbh->prepare($query);
    $statement->bindParam(':uid', $uid);
    if($statement->execute() === true)
        exit('success');
}

if ($type == 'unexchange') {
    $query = <<<QUERY
    update fanwe_scratch_bonus set is_exchanged = 0 where user_id = :uid
QUERY;
    $statement = $dbh->prepare($query);
    $statement->bindParam(':uid', $uid);
    if($statement->execute() === true)
        exit('success');
}
