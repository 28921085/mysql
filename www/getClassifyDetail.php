<?php
header("Content-type:text/html;charset=utf-8");
include_once "db_conn.php";

$query = ("select * from ClassifyDetail");
$stmt = $db->prepare($query);
$stmt ->execute();
$result = $stmt->fetchAll();
 //以上寫法是為了防止「sql injection」
$myJSON = json_encode($result);
echo $myJSON;
?>