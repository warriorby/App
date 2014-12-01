<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];

	if($uid != null){
		$sql = "select * from space_exper where uid=$uid";
		$rs = $db->query($sql);
		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
