<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$tid = $arr['tid'];
	$uid = $arr['uid'];
	$star_level = $arr['star_level'];
	$comment = $arr['comment'];

	if($tid != null && $uid != null){
		$timestamp = mktime();
		$sql = "insert into comment(tid,uid,star_level,comment,updated) values ($tid,$uid,$star_level,$comment,$timestamp)";
		$db->exec($sql);
		$comment_id = $db->lastInsertId();

		$return_arr = ["tid"=>$tid,"uid"=>$uid,"comment_id"=>$comment_id];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");

    }else{
        echo json_encode(0);
    }
