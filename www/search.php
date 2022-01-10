<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "db_conn.php";
$style = $_POST["style"];
$query = sprintf("select request,domain_min,domain_max from Formula
                  WHERE name=(select name from
                              ClassifyDetail 
                              where name='%s')",$style);
$stmt = $db->prepare($query);
$stmt ->execute();
$result = $stmt->fetchAll();
 //以上寫法是為了防止「sql injection」
 $myJSON = json_encode($result);
echo $myJSON;
?>