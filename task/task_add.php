<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$type = $arr['task_type'];
$task = $arr['task_name'];
$plan_time = $arr['plan_time'];
$is_remind = $arr['needRemind'];
$photo_status = $arr['needPhoto'];
$uid = $arr['uid'];
//$plan_start_time = $arr['plan_startTime'];


if (count($arr) != 0) {
    $timestamp = mktime();
    $db->exec("insert into task_main(uid,plan_time,is_remind,add_time,photo_status,status) values ($uid,$plan_time,$is_remind,$timestamp,$photo_status,1)");
   // $db->exec("insert into task_main(uid,plan_time,is_remind,add_time,plan_start_time,photo_status,status) values ($uid,$plan_time,$is_remind,$timestamp,$plan_start_time,$photo_status,1)");

    $tid = $db->lastInsertId();
    $db->exec("insert into task_profile(uid,tid,tname,type) values ($uid,$tid,'$task',$type)");
    $db->exec("insert into task_log(uid,tid,descr,updated) values ($uid,$tid,'添加任务',$timestamp)");

    $return_arr = array("uid" => $uid, "tid" => $tid);
    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}
