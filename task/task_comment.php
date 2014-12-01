<?php
require("../include/connection.php");
require("../include/get_data.php");

	$tid = $arr['tid'];
	$uid = $arr['uid'];
	$star_level = $arr['star_level'];
	$comment = $arr['comment'];

	if($tid != null && $uid != null){
		$timestamp = mktime();
		$sql = "update task_main set star_level=$star_level,comment=$comment,updated=$timestamp where uid=$uid and tid=$tid";
		$db->exec($sql);

		$return_arr = array("tid"=>$tid,"uid"=>$uid,"star_level"=>$star_level,"comment"=>$comment);
        include("../include/return_data.php");
    }else{
        echo json_encode(0);
    }
