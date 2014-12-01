<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$sub_id = $arr['sub_id'];
$score = $arr['score'];
$average = $arr['average'];
$total = $arr['total'];
$exam_date = $arr['exam_date'];

if (isset($uid)) {
    //echo $exam_date;
    $sql = "insert into score_main(sub_id,uid,score,average,total,exam_date) values ($sub_id,$uid,$score,$average,$total,'$exam_date')";
    $db->exec($sql);
    $score_id = $db->lastInsertId();
    $return_arr = ["uid" => $uid, "score_id" => $score_id,"sub_id"=>$sub_id,"score"=>$score,"average"=>$average,"total"=>$total,"exam_data"=>$exam_date];

    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}
?>