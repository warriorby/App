<?php
require "../include/connection.php";
include "../include/get_data.php";

$cid = $arr['cid'];
$pid = $arr['pid'];
if($cid != null && $pid != null){

    $sql = "select zid,zone from city_list where cid like '$cid' and pid like '$pid'";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}