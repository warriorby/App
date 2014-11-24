<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$eid = $arr['eid'];

	if($uid != null && $eid != null){
		$sql = "delete from space_profile where uid=$uid and eid=$eid";
		$db->exec($sql);

		$return_arr =array("uid"=>$uid);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
