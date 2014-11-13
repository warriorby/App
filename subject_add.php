<?php
	require_once("connection.php");

	$arr = $_POST["data"];

	$uid = $arr['uid'];
	$subject = $arr['subject'];

	if($uid != null && $subject != null){
		$timestamp = time();
		$sql = "insert into score_profile(uid,subject,updated) values ($uid,'$subject',$timestamp)";
		$db->exec($sql);
		$sub_id = $db->lastInsertId();

		$return_arr = ["uid"=>$uid, "$sub_id"=>$sub_id];

		print_r($return_arr);
		echo $return_arr;
	}else{
		echo 0;
	}
?>