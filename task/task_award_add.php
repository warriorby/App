<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$award = $arr['award'];
	$factor = $arr['factor'];

	if($uid != null && $award != null && $factor != null){
		$timestamp = time();
		$sql = "insert into task_award (uid,award,factor,updated) values ($uid,'$award',$factor,$timestamp)";
		$db->exec($sql);
		$aid =$db->lastInsertId();

		$return_arr = ["uid"=>$uid, "aid"=>$aid];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
