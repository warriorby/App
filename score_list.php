<?php
	require_once("connection.php");
	$arr = $_POST["data"];

	$uid = $arr['uid'];

	if(isset($uid)){
		$sql = "select * from score_main where uid=$uid";
		$rs = $db->query($sql);
		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

		print_r($return_arr);
		echo $return_arr;
	}else{
		echo 0;
	}
?>