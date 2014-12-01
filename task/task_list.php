<?php
require("../include/connection.php");
require("../include/get_data.php");

	$uid = $arr['uid'];
	$role = $arr['role'];

	$return_arr = array();
	if($uid != null && $role != null){
        switch($role){
            case 1:
                $sql3 = "select * from user_relation where to_uid=$uid";
                $rs3 = $db->query($sql3);
                $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
                $uid_c = $rs3_arr[0]['uid_c'];
                $sql = "select * from task_main where uid=$uid_c and date(FROM_UNIXTIME(start_time)) = curdate()";
                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $return_arr = $rs_arr;
                break;
            case 2:
                $sql = "select * from task_main where uid=$uid and date(FROM_UNIXTIME(start_time)) = curdate()";
                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $return_arr = $rs_arr;
                break;
            default:
                echo json_encode(0);
                break;
        }

        include("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
