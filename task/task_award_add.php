<?php
require "../include/connection.php";
require "../include/get_data.php";

	$uid = $arr['uid'];
	$award = $arr['award'];
	$factor = $arr['factor'];

	if($uid != null && $award != null && $factor != null){
		$timestamp = time();
        $sql2 = "select * from user_main where uid=$uid";
        $rs2 = $db->query($sql2);
        $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
        $gold = $rs2_arr[0]['gold'];

        if($gold <$factor){
            $status = 1;
        }else{
            $status = 2;
        }
        $sql = "insert into task_award (uid,award,factor,status,updated) values ($uid,'$award',$factor,$status,$timestamp)";
        $db->exec($sql);

        $return_arr = array("uid"=>$uid, "award_id"=>$aid,"status"=>$status);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
