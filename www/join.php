<?php
header("Content-type:text/html;charset=utf-8");
include_once "db_conn.php";
$style = $_POST["style"];
$query = sprintf("select * 
           from GraphRecord,ClassifyDetail
           where GraphRecord.name=ClassifyDetail.name and GraphRecord.name='%s'",$style);
$stmt = $db->prepare($query);
$stmt ->execute();
$result = $stmt->fetchAll();
 //以上寫法是為了防止「sql injection」
 $myJSON = json_encode($result);
echo $myJSON;
?>