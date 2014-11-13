<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$tid = $arr["tid"];
	$uid = $arr["uid"];

	if($tid != null && $uid != null){
		$timestamp = time();
		$sql = "update task_log set pause_time = $timestamp, pause_count = pause_count+1 where tid = $tid and uid = $uid";
		$db->exec($sql);

		
		
		$return_arr = ["uid"=>$uid, "tid"=>$tid,"pause_time"=>$timestamp];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
?>