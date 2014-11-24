<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$sub_id = $arr['sub_id'];
	$score_id = $arr['score_id'];

	if($uid != null && $sub_id != null && $score_id != null){

		$sql = "delete from score_main where uid=$uid and sub_id=$sub_id and score_id=$score_id";
		$db->exec($sql);
		$return_arr = ["uid"=>$uid];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");

	}else{
        echo json_encode(0);
	}
?>