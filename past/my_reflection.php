<?php
require "../include/connection.php";
include "../include/get_data.php";

$uid = $arr['uid'];

if ($uid != null) {
    $sql = "select * from  user_main where uid=$uid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $gold = $rs_arr[0]['gold'];

    $return_arr = ['uid'=>$uid,'gold'=>$gold];
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}