<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$post_url = $arr['post_url'];


if($uid != null && $pid != null){
	$timestamp = mktime();
	$sql = "insert into space_profile(uid,pid,post_url,post_updated) values ($uid,$pid,'$post_url',$timestamp)";
	$db->exec($sql);

	$return_arr = array("uid"=>$uid, "post_url"=>$post_url, "pid"=>$pid);

    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}
