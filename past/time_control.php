<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
if($uid != null){
    $sql = "select * from task_main where uid = $uid and status=3";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}