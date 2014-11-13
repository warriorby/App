<?php
	require_once("connection.php");

	$arr = $_GET["data"];

	$uid = $arr['uid'];
	$sub_id = $arr['sub_id'];
	$score_id = $arr['score_id'];

	if($uid != null && $sub_id != null && $score_id != null){

		$sql = "delete from score_main where uid=$uid and sub_id=$sub_id and score_id=$score_id";
		$db->exec($sql);

		$return_arr = ["uid"=>$uid];

		print_r($return_arr);
		echo $return_arr;

	}else{
		echo 0;
	}
?>