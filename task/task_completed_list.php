<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$status = $arr['status'];
	$count_get = $arr['count'];

	$return_arr = array();

	//today_start
	$y = date("Y");
	$m = date("m");
	$d = date("d");
	$today_start = mktime(0,0,0,$m,$d,$y);
	$start_date = date("YmdHis",$today_start);
	/*echo $today_start."<br/>";
	echo $start_date."<br/>";*/
	//today_end
	$today_end = mktime(23,59,59,$m,$d,$y);
	$end_date = date("YmsHis",$today_end);
	/*echo $today_end."<br/>";
	echo $end_date;*/

	if(isset($uid)){
		$sql = "select * from task_main where status=3 and uid=$uid and DATE_FORMAT(FROM_UNIXTIME(start_time),'%Y%m%d%H%i%s')>=$start_date and $end_date>=DATE_FORMAT(FROM_UNIXTIME(start_time),'%Y%m%d%H%i%s')";
		$rs = $db->query($sql,PDO::FETCH_ASSOC);

		foreach($rs as $row){
			$sub_arr = array();
			$sub_arr['uid']=$row['uid'];

			$return_arr[] = $sub_arr;
			$count_return=count($sub_arr['uid']);
		}

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
