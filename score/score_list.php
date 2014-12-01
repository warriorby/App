<?php
require("../include/connection.php");
require("../include/get_data.php");

$uid = $arr['uid'];
$res_arr = array();
if (isset($uid)) {
    $sql = "select * from score_main where uid=$uid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs_arr as $row) {
         //var_dump($row);
        $sub_arr = array();
        $sub_id = $row['sub_id'];
        $sql2 = "select * from score_profile where sub_id=$sub_id";
        $rs2 = $db->query($sql2);
        $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
        $subject = $rs2_arr[0]['subject'];

        $sub = ["subject"=>$subject];
        $row2 = array_merge($row,$sub);
       /* $sub_arr[] = $uid;
        $sub_arr[] = $sub_id;
        $sub_arr[] = $subject;
        $sub_arr[] = $row['score_id'];
        $sub_arr[] = $row['score'];
        $sub_arr[] = $row['total'];
        $sub_arr[] = $row['average'];
        $sub_arr[] = $row['exam_date'];
        $res_arr[] = $sub_arr;*/

        $res_arr[] = $row2;

    }
    $return_arr = $res_arr;
    include("../include/return_data.php");
} else {
    echo json_encode(0);
}
