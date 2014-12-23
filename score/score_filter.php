<?php
require("/include/connection.php");
require("/include/get_data.php");

$uid = $arr['uid'];
$start = $arr['start'];
$end = $arr['end'];
$sub_id = $arr['sub_id'];
if (isset($uid) && isset($sub_id)) {
    $sql = "select * from score_main where exam_date>='$start' and '$end'>=exam_date and uid=$uid and sub_id=$sub_id";
    $rs = $d2b->query($sql);
    $return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    include("/include/return_data.php");
} else {
    echo json_encode(0);
}