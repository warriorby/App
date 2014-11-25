<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
if($uid != null){
    $sql = "select * from task_main where uid=$uid and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $week_count = 0;
    foreach($rs_arr as $key=>$value){
       $week_count += $value['real_time'];
    }
    $week_total = 48*60;
    $return_arr = ["uid"=>$uid,"week_count"=>$week_count,"week_total"=>$week_total];
    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}