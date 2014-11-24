<?php
require "../include/connection.php";
include "../include/get_data.php";

	$uid = $arr['uid'];
	$award = $arr['reward_content'];
	$factor = $arr['reward_conditions'];

	if($uid != null && $award != null && $factor != null){
		$timestamp = time();
       /* $database = new medoo();
        $db_arr = ['uid'=>$uid,'award'=>$award,'factor'=>$factor,'updated'=>$timestamp];
        $aid = $database->insert('task_award',$db_arr);*/

		$sql = "insert into task_award (uid,award,factor,updated) values ($uid,'$award',$factor,$timestamp)";
		$db->exec($sql);
		$aid =$db->lastInsertId();

		$return_arr = array("uid"=>$uid, "aid"=>$aid);

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
