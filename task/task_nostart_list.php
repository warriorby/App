<?php
require("../include/connection.php");
require("../include/get_data.php");

$uid = $arr['uid'];
$role = $arr['role'];
$res_arr = array();

if ($uid != null && $role != null) {
    switch($role){
        case 1:
            $sql = "select * from task_main where uid=$uid and status=1";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

            $sql2 = "select * from user_relation where to_uid=$uid";
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $uid_c = $rs2_arr[0]['uid_c'];

            $sql3 = "select * from task_main where uid=$uid_c and status=1";
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);

            $return_arr = array_merge($rs_arr,$rs3_arr);
            include "../include/return_data.php";
            break;
        case 2:
            $sql = "select * from task_main where uid=$uid and status=1";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

            $sql2 = "select * from user_relation where uid_c=$uid";
            $rs2 = $db->query($sql2);
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $uid_P = $rs2_arr[0]['to_uid'];

            $sql3 = "select * from task_main where uid=$uid_P and status=1";
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);

            $return_arr = array_merge($rs_arr,$rs3_arr);
            include "../include/return_data.php";
            break;
        default:
            echo json_encode(0);
            break;
    }
} else {
    echo json_encode(0);
}
	
