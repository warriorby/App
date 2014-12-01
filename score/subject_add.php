<?php
require("../include/connection.php");
require("../include/get_data.php");

	$uid = $arr['uid'];
	$subject = $arr['subject'];

	if($uid != null && $subject != null){
		$timestamp = time();
		$sql = "insert into score_profile(uid,subject,updated) values ($uid,'$subject',$timestamp)";
		$db->exec($sql);
		$sub_id = $db->lastInsertId();

		$return_arr = ["uid"=>$uid, "$sub_id"=>$sub_id];

        include("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
?>