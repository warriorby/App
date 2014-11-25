<?php
require "../include/connection.php";
include "../include/get_data.php";

$task_type=$arr['task_type'];

if($task_type != null){
    $sql = "select * from task_profile where task_type=$task_type";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include "../include/return_data.php";
}