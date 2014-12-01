<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");
include_once("../include/upload_dir.php");

$result_arr = array();
foreach($arr as $row){
    $sub_arr = array();
   // print_r($row);
    $uid = $row['uid'];
   // echo $uid;
    $sql = "select * from user_profile where uid=$uid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $real_name = $rs_arr[0]['real_name'];

    $sql2 = "select * from user_avatar where uid=$uid";
    $rs2 = $db->query($sql2);
    $rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
    $avatar_name = $rs_arr2[0]['avatar'];

    $avatar_url = $avatar_upload.$avatar_name;

    $sub_arr["uid"]=$uid;
    $sub_arr["nickname"]=$real_name;
   // $sub_arr["avatar_url"]=$avatar_url;
    $result_arr[]=$sub_arr;
}
    $return_arr = $result_arr;
    include_once("../include/return_data.php");