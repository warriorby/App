<?php
require "../include/connection.php";
include "../include/get_data.php";

$uid = $arr['uid'];

if($uid != null){

    $sql2 = "select * from user_education where uid=$uid";
    $rs2 = $db->query($sql2);
    $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
    $cid = $rs2_arr[0]['cid'];
    $zid = $rs2_arr[0]['zid'];
    $sid = $rs2_arr[0]['sid'];
    $gid = $rs2_arr[0]['gid'];
    $class_id=$rs2_arr[0]['class_id'];

    $sql3 = "select * from city_list where cid='$cid' and zid='$zid'";
    $rs3 = $db->query($sql3);
    $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
    $city = $rs3_arr[0]['city'];
    $zone = $rs3_arr[0]['zone'];

    $sql4 = "select * from school_list where sid='$sid' and gid='$gid' and class_id='$class_id'";
    $rs3 = $db->query($sql4);
    $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
    $school = $rs3_arr[0]['school'];

    $return_arr = ['uid'=>$uid,'city'=>$city,'zone'=>$zone,'school'=>$school,'grade'=>$gid,'className'=>$class_id];
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}