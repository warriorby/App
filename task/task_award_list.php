<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid =$arr['uid'];

	$return_arr = array();

	if($uid != null){
		$sql = "select * from task_award where uid = $uid";
		$rs = $db->query($sql,PDO::FETCH_ASSOC);
		foreach($rs as $row){
			$sub_arr = array();
			$sub_arr['award'] = $row;
			$return_arr[] = $sub_arr;
		}

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
