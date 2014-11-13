<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$tid =$arr['tid'];

	if($uid != null && $tid != null){
		$timestamp = mktime();
		$sql = "update task_log set continue_time = $timestamp where tid = $tid and uid = $uid";
		$db->exec($sql);

		$sql2 = "select * from task_log where tid=$tid and uid=$uid";
		$rs = $db->query($sql2);
		$rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
		$pause_time = $rs_arr[0]['pause_time'];

		//echo $pause_time."<br/>";

		$pause_date = date("YmdHis",$pause_time);
		$continue_date = date("YmdHis",$timestamp);

		//echo $pause_date."<br/>";
		//echo $continue_date."<br/>";

		$rest_time = round((strtotime($continue_date)-strtotime($pause_date))/60);

		$sql3 = "update task_main set rest_time = rest_time+$rest_time where uid = $uid and tid = $tid";
		$db->exec($sql3);

		$return_arr = ["uid"=>$uid, "tid"=>$tid, "rest_time"=>$rest_time];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
