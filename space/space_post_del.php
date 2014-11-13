<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$pid = $arr['pid'];

	if($uid != null && $pid != null){
		$sql = "delete from space_profile where uid=$uid and pid=$pid";
		$db->exec($sql);

		$return_arr =["uid"=>$uid];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}