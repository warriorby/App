<?php
require "../include/connection.php";
include "../include/get_data.php";

$uid = $arr['uid'];

if(isset($uid)){
    $sql = "select * from task_main where uid=$uid and status=3 date(FROM_UNIXTIME(end_time)) = curdate()";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $plan_time_total = 0;
    $real_time_total = 0;
    $i=0;
    foreach($rs_arr as $key=>$value){
        $plan_time_total += $value['plan_time'];
        $real_time_total += $value['real_time'];
        $i++;
    }

    $return_arr = ["task_count"=>$i,"plan_time_total"=>$plan_time_total,"real_time_total"=>$real_time_total];
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}