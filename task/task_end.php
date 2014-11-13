<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$tid = $arr['tid'];
	$uid = $arr['uid'];
	$photo_status = $arr['photo_status'];

	if($tid != null && $uid != null){

				$timestamp = mktime();
				$sql = "update task_main set status=3, end_time=$timestamp where tid=$tid and uid=$uid";
				$db->exec($sql);


		$sql2 = "select * from task_main where tid=$tid and uid=$uid";
		$rs = $db->query($sql2);
		$rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
		$start_time = $rs_arr[0]['start_time'];
		$rest_time = $rs_arr[0]['rest_time'];

		$end_date = date("YmdHis",$timestamp);
		$start_date = date("YmdHis",$start_time);

		$count_time = round((strtotime($end_date)-strtotime($start_date))/60);
		$real_time = $count_time - $rest_time;

		$sql3 = "update task_main set real_time = $real_time where tid=$tid and uid=$uid";
		$db->exec($sql4);

		$return_arr = ["uid"=>$uid, "tid"=>$tid, "end_time"=>$timestamp, "real_time"=>$real_time, "rest_time"=>$rest_time];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}