<?php
	require_once("connection.php");

	$arr = $_POST["data"];

	$uid = $arr['uid'];
	$start = $arr['start'];
	$end = $arr['end'];
	$sub_id = $arr['sub_id'];

	if ($uid != null && $sub_id != null) {
		$sql = "select * from score_main where exam_date>='$start' and '$end'>=exam_date and uid=$uid and sub_id=$sub_id";
		$rs = $db->query($sql);
		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

		print_r($return_arr);
		echo $return_arr;
	}else{
		echo 0;
	}
?>