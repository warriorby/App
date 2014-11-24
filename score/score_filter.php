<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$start = $arr['start'];
	$end = $arr['end'];
	$sub_id = $arr['sub_id'];

	if ($uid != null && $sub_id != null) {
		$sql = "select * from score_main where exam_date>='$start' and '$end'>=exam_date and uid=$uid and sub_id=$sub_id";
		$rs = $db->query($sql);
		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
?>