<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$tid = $arr['tid'];
	$uid = $arr['uid'];

	if($tid != null && $uid != null){
		$sql = "delete from task_main where tid=$tid and uid=$uid";
		$db->exec($sql);

		$sql2 = "delete from task_log where tid=$tid and uid=$uid";
		$db->exec($sql2);

        $return_arr = array("uid"=>$uid);
        include_once("../include/return_data.php");
	}else{
		echo 0;
	}


