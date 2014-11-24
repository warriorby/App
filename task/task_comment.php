<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$tid = $arr['tid'];
	$uid = $arr['uid'];
	$star_level = $arr['star_level'];
	$comment = $arr['comment'];

	if($tid != null && $uid != null){
		$timestamp = mktime();
		$sql = "insert into comment(tid,uid,star_level,comment,updated) values ($tid,$uid,$star_level,$comment,$timestamp)";
		$db->exec($sql);
		$comment_id = $db->lastInsertId();

		$return_arr = array("tid"=>$tid,"uid"=>$uid,"comment_id"=>$comment_id);

        include_once("../include/return_data.php");

    }else{
        echo json_encode(0);
    }
