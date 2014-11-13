<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$tid = $arr['tid'];
	$comment_id = $arr['comment_id'];

	if($uid != null && $tid != null){
		$sql = "select * from task_main where uid=$uid and tid=$tid";
		$sql2 = "select * from task_profile where uid=$uid and tid=$tid";
		$sql3 = "select * from task_picture where uid=$uid and tid=$tid";
		$sql4 = "select * from comment where where uid=$uid and tid=$tid";

		$rs = $db->query($sql);
		$rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
		$real_time = $rs_arr[0]['real_time'];
		$rest_time = $rs_arr[0]['rest_time'];

		$rs2 = $db->query($sql2);
		$rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
		$tname = $rs_arr2[0]['tname'];
		
		$rs3 = $db->query($sql3);
		$rs_arr3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
		$picture_start = $rs_arr3[0]['picture_start1'];
		$picture_end = $rs_arr3[0]['picture_end1'];

		$rs4 = $db->query($sql4);
		$rs_arr4 = $rs4->fetchAll(PDO::FETCH_ASSOC);
		$comment = $rs_arr4[0]['comment'];
		$star_level = $rs_arr4[0]['star_level'];

		$return_arr = ["uid"=>$uid, "tid"=>$tid, "real_time"=>$real_time, "rest_time"=>$rest_time, "tname"=>$tname, "picture_start"=>$picture_start, "picture_end"=>$picture_end,

						"comment"=>$comment, "star_level"=>$star_level];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}