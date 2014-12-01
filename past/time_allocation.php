<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$role = $arr['role'];
if($uid != null && $role != null){
    switch($role){
        case 1:
            $sql8 = "select * from user_relation where to_uid=$uid";
            $rs8 = $db->query($sql8);
            $rs8_arr = $rs8->fetchAll(PDO::FETCH_ASSOC);
            $uid_c = $rs8_arr[0]['uid_c'];

            $sql = "select * from task_main where uid=$uid_c and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql2 = "select * from task_main where uid=$uid_c and status=3 and task_type=1 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql3 = "select * from task_main where uid=$uid_c and status=3 and task_type=2 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql4 = "select * from task_main where uid=$uid_c and status=3 and task_type=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql5 = "select * from task_main where uid=$uid_c and status=3 and task_type=4 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql6 = "select * from task_main where uid=$uid_c and status=3 and task_type=5 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql7 = "select * from task_main where uid=$uid_c and status=3 and task_type=6 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";

            //total
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $week_count = 0;
            foreach($rs_arr as $key=>$value){
                $week_count += $value['real_time'];
            }

            //task_type=1
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $study_count = 0;
            foreach($rs2_arr as $key=>$value){
                $study_count += $value['real_time'];
            }

            //task_type=2
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $sports_count = 0;
            foreach($rs3_arr as $key=>$value){
                $sports_count += $value['real_time'];
            }

            //task_type=3
            $rs4 = $db->query($sql4);
            $rs4_arr = $rs4->fetchAll(PDO::FETCH_ASSOC);
            $play_count = 0;
            foreach($rs4_arr as $key=>$value){
                $play_count += $value['real_time'];
            }

            //task_type=4
            $rs5 = $db->query($sql5);
            $rs5_arr = $rs5->fetchAll(PDO::FETCH_ASSOC);
            $life_count = 0;
            foreach($rs5_arr as $key=>$value){
                $life_count += $value['real_time'];
            }

            //task_type=5
            $rs6 = $db->query($sql6);
            $rs6_arr = $rs6->fetchAll(PDO::FETCH_ASSOC);
            $talent_count = 0;
            foreach($rs6_arr as $key=>$value){
                $talent_count += $value['real_time'];
            }

            //task_type=6
            $rs7 = $db->query($sql7);
            $rs7_arr = $rs7->fetchAll(PDO::FETCH_ASSOC);
            $read_count = 0;
            foreach($rs7_arr as $key=>$value){
                $read_count += $value['real_time'];
            }

            $return_arr = ["uid"=>$uid_c,"week_count"=>$week_count,"study_count"=>$study_count,"sports_count"=>$sports_count,"play_count"=>$play_count,
                "life_count"=>$life_count,"talent_count"=>$talent_count,"read_count"=>$read_count];
            include "../include/return_data.php";
            break;
        case 2:
            $sql = "select * from task_main where uid=$uid and status=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql2 = "select * from task_main where uid=$uid and status=3 and task_type=1 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql3 = "select * from task_main where uid=$uid and status=3 and task_type=2 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql4 = "select * from task_main where uid=$uid and status=3 and task_type=3 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql5 = "select * from task_main where uid=$uid and status=3 and task_type=4 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql6 = "select * from task_main where uid=$uid and status=3 and task_type=5 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";
            $sql7 = "select * from task_main where uid=$uid and status=3 and task_type=6 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(FROM_UNIXTIME(end_time))";

            //total
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $week_count = 0;
            foreach($rs_arr as $key=>$value){
                $week_count += $value['real_time'];
            }

            //task_type=1
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $study_count = 0;
            foreach($rs2_arr as $key=>$value){
                $study_count += $value['real_time'];
            }

            //task_type=2
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $sports_count = 0;
            foreach($rs3_arr as $key=>$value){
                $sports_count += $value['real_time'];
            }

            //task_type=3
            $rs4 = $db->query($sql4);
            $rs4_arr = $rs4->fetchAll(PDO::FETCH_ASSOC);
            $play_count = 0;
            foreach($rs4_arr as $key=>$value){
                $play_count += $value['real_time'];
            }

            //task_type=4
            $rs5 = $db->query($sql5);
            $rs5_arr = $rs5->fetchAll(PDO::FETCH_ASSOC);
            $life_count = 0;
            foreach($rs5_arr as $key=>$value){
                $life_count += $value['real_time'];
            }

            //task_type=5
            $rs6 = $db->query($sql6);
            $rs6_arr = $rs6->fetchAll(PDO::FETCH_ASSOC);
            $talent_count = 0;
            foreach($rs6_arr as $key=>$value){
                $talent_count += $value['real_time'];
            }

            //task_type=6
            $rs7 = $db->query($sql7);
            $rs7_arr = $rs7->fetchAll(PDO::FETCH_ASSOC);
            $read_count = 0;
            foreach($rs7_arr as $key=>$value){
                $read_count += $value['real_time'];
            }

            $return_arr = ["uid"=>$uid,"week_count"=>$week_count,"study_count"=>$study_count,"sports_count"=>$sports_count,"play_count"=>$play_count,
                "life_count"=>$life_count,"talent_count"=>$talent_count,"read_count"=>$read_count];
            include "../include/return_data.php";
            break;
        default:
            echo json_encode(0);
            break;
    }
}else{
    echo json_encode(0);
}