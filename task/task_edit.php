<?php
require "../include/connection.php";
include "../include/get_data.php";

$tid = $arr['tid'];
$plan_time = $arr['plan_time'];
$is_remind = $arr['needRemind'];
$photo_status = $arr['needPhoto'];
$uid = $arr['uid'];
//$plan_start_time = $arr['plan_startTime'];

if($uid != null && $tid !=null){
    $sql="update task_main set plan_time=$plan_time,is_remind=$is_remind,photo_status=$photo_status where uid=$uid and tid=$tid";
    $db->exec($sql);

    $return_arr = ["uid"=>$uid,"tid"=>$tid,"plan_time"=>$plan_time,"is_remind"=>$is_remind,"photo_status"=>$photo_status];
    include "../include/return_data.php";
}