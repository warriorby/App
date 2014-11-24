<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$pid = $arr['pid'];

	if($uid != null && $pid != null){
		$sql = "delete from space_profile where uid=$uid and pid=$pid";
		$db->exec($sql);

		$return_arr =array("uid"=>$uid);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}