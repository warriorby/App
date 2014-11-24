<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];

	$return_arr = array();

if( $uid != null){
	$sql = "select * from task_main where uid=$uid and status=1";
	$sql2 = "select * from task_profile where uid=$uid";
	$sql3 = "select * from user_main where uid=$uid";

	$rs = $db->query($sql,PDO::FETCH_ASSOC);
		
	foreach($rs as $row){
		$sub_arr = array();
		$sub_arr['plan_time'] = $row['plan_time'];
		$sub_arr['is_remind'] = $row['is_remind'];
		$sub_arr['photo_status'] = $row['photo_status'];
		
		$return_arr[] = $sub_arr;
	}

	$rs2 = $db->query($sql2,PDO::FETCH_ASSOC);
	
	foreach($rs2 as $row2){
		$sub_arr2 = array();
		$sub_arr2['tname'] = $row2['tname'];
		$sub_arr2['type'] = $row2['type'];

		$return_arr[] = $sub_arr2;
	}

	$rs3 = $db->query($sql3,PDO::FETCH_ASSOC);
	
	foreach($rs3 as $row3){
		$sub_arr3 = array();
		$sub_arr3['role'] = $row3['role'];

		$return_arr[] = $sub_arr3;
	}

    include_once("../include/return_data.php");
}else{
	echo json_encode(0);
}
	
