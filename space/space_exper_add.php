<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	$exper_content = $arr['exper_content'];

if($uid != null && $exper_content != null){
	$timestamp = time();
	$sql = "insert into space_exper(uid,exper,updated) values ($uid,'$exper_content',$timestamp)";
	$db->exec($sql);

	$return_arr = array("uid"=>$uid,"exper_content"=>$exper_content);

    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}
