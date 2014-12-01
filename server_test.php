<?php

//require_once("/include/connection.php");
$timestamp =time();
echo $timestamp;
echo "<br/>";
/*$rs4 = $db->query("select * from user_main where phone=15618128202");
$rs4_arr = $rs4->fetchAll(PDO::FETCH_ASSOC);
echo count($rs4_arr);*/

$day = date("w",$timestamp);
$role = 1;
if($role=1){
    $day=7;
    echo $day;
}
echo $day;

