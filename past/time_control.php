<?php
require("../include/connection.php");
require("../include/get_data.php");

$uid = $arr['uid'];
$role = $arr['role'];
if($uid != null && $role != null){
    switch($role){
        case 1:
            $sql3 = "select * from user_relation where to_uid=$uid";
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $uid_c = $rs3_arr[0]['uid_c'];

            $sql = "select * from task_main where uid=$uid_c and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $week_count = 0;
            foreach($rs_arr as $key=>$value){
                $week_count += $value['real_time'];
            }
            $week_total = 48*60;
            $return_arr = ["uid"=>$uid_c,"week_count"=>$week_count,"week_total"=>$week_total];
            include("../include/return_data.php");
            break;
        case 2:
            $sql = "select * from task_main where uid=$uid and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $week_count = 0;
            foreach($rs_arr as $key=>$value){
                $week_count += $value['real_time'];
            }
            $week_total = 48*60;
            $return_arr = ["uid"=>$uid,"week_count"=>$week_count,"week_total"=>$week_total];
            include("../include/return_data.php");
            break;
        default:
            echo json_encode(0);
            break;
    }

}else{
    echo json_encode(0);
}