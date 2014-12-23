<?php
require("../include/conn.php");
require("../include/get_data.php");

$uid = $arr['uid'];
$res_arr = array();
if (isset($uid)) {
    $rs_arr = $d2b->select("score_main","*",["uid"=>$uid]);
    foreach ($rs_arr as $row) {
         //var_dump($row);
        $sub_arr = array();
        $sub_id = $row['sub_id'];
        $rs2_arr = $d2b->select("score_profile",["subject"],["sub_id"=>$sub_id]);
        $subject = $rs2_arr[0]['subject'];

        $sub = ["subject"=>$subject];
        $row2 = array_merge($row,$sub);
        $res_arr[] = $row2;
    }
    $return_arr = $res_arr;
    include("../include/return_data.php");
} else {
    echo json_encode(0);
}
