<?php
require "../include/connection.php";
require "../include/get_data.php";

$uid = $arr['uid'];
$role = $arr['role'];
$sub_arr = array();
if ($uid != null && $role != null) {
    switch($role){
        case 1:
            $sql3 = "select * from user_relation where to_uid=$uid";
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $uid_c = $rs3_arr[0]['uid_c'];

            $sql2 = "select * from task_main where uid=$uid_c and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rs2_arr as $row) {
                $end_time = $row['end_time'];
                $sql = "select * from task_main where uid=$uid_c and status=3 and date(FROM_UNIXTIME(end_time))=date(FROM_UNIXTIME($end_time))";
                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $plan_time_total = 0;
                $real_time_total = 0;
                $i = 0;
                foreach ($rs_arr as $key => $value) {
                    $plan_time_total += $value['plan_time'];
                    $real_time_total += $value['real_time'];
                    $i++;
                }
                $week_day = date("w", $end_time);
                $day_arr = ["uid" => $uid_c, "task_count" => $i, "plan_time_total" => $plan_time_total, "real_time_total" => $real_time_total, "weekday" => $week_day];
                $sub_arr[] = $day_arr;
            }
            break;
        case 2:
            $sql2 = "select * from task_main where uid=$uid and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rs2_arr as $row) {
                $end_time = $row['end_time'];
                $sql = "select * from task_main where uid=$uid and status=3 and date(FROM_UNIXTIME(end_time))=date(FROM_UNIXTIME($end_time))";
                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $plan_time_total = 0;
                $real_time_total = 0;
                $i = 0;
                foreach ($rs_arr as $key => $value) {
                    $plan_time_total += $value['plan_time'];
                    $real_time_total += $value['real_time'];
                    $i++;
                }
                $week_day = date("w", $end_time);
                $day_arr = ["uid" => $uid, "task_count" => $i, "plan_time_total" => $plan_time_total, "real_time_total" => $real_time_total, "weekday" => $week_day];
                $sub_arr[] = $day_arr;
            }
            break;
        default:
            echo json_encode(0);
            break;

    }

    $return_arr = $sub_arr;
    include "../include/return_data.php";
} else {
    echo json_encode(0);
}