<?php
require "../include/connection.php";
include "../include/get_data.php";

$uid =$arr['uid'];
$aid = $arr['award_id'];

if($uid !=null && $aid != null){
    $timestamp = time();
    $sql = "update task_award set status=3,updated=$timestamp where uid=$uid and award_id=$aid";
    $db->exec($sql);

    $return_arr = ["uid"=>$uid,"award_id"=>$aid];
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}