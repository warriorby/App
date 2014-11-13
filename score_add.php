<?php
	require_once("connection.php");

	$arr = $_POST["data"];

	$uid = $arr['uid'];
	$sub_id = $arr['sub_id'];
	$score = $arr['score'];
	$average = $arr['average'];
	$total = $arr['total'];
	$exam_date = $arr['exam_date'];

	if(isset($uid)){
		echo $exam_date;

		$sql = "insert into score_main(sub_id,uid,score,average,total,exam_date) values ($sub_id,$uid,$score,$average,$total,'$exam_date')";
		$db->exec($sql);
		$score_id = $db->lastInsertId();

		$return_arr = ["uid"=>$uid,"score_id"=>$score_id];

		print_r($return_arr);
		echo $return_arr;
	}
?>