<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$tid = $arr['tid'];

	if($uid != null && $tid != null){

			$timestamp = time();
			$db->exec("update task_main set start_time = $timestamp where tid = $tid and uid=$uid");

			$return_arr =["uid"=>$uid, "tid"=>$tid];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");

	}else{
        echo json_encode(0);
    }
