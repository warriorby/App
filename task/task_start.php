<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$tid = $arr['tid'];

	if($uid != null && $tid != null){

			$timestamp = time();
			$db->exec("update task_main set start_time = $timestamp where tid = $tid and uid=$uid");

			$return_arr =array("uid"=>$uid, "tid"=>$tid, "start_time"=>$timestamp);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
    }
