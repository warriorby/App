<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$type = $arr['type'];
$task = $arr['tname'];
$plan_time = $arr['plan_time'];
$is_remind = $arr['is_remind'];
$photo_status = $arr['photo_status'];
$role = $arr['role'];
$uid = $arr['uid'];

if (count($arr) != 0) {

    $timestamp = mktime();
    $db->exec("insert into task_main(uid,plan_time,is_remind,add_time,photo_status,status) values ($uid,$plantime,$isremind,$timestamp,$photostatus,1)");
    $tid = $db->lastInsertId();
    $db->exec("insert into task_profile(uid,tid,tname,type) values ($uid,$tid,'$task',$type)");

    $db->exec("insert into task_log(uid,tid,descr,updated) values ($uid,$tid,'添加任务',$timestamp)");

    $return_arr = ["uid" => $uid, "tid" => $tid];

    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
}else{
    echo json_encode(0);
}
