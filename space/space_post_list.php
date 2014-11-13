<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];


	if($uid != null){
		$sql = "select * from space_profile where uid=$uid";

		$rs = $db->query($sql);

		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
