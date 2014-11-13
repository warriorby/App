<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

	$uid = $arr['uid'];
	$eid = $arr['eid'];
	$exper_content = $arr['exper_content'];

if($uid != null && $eid != null){
	$timestamp = mktime();
	$sql = "insert into space_profile(uid,eid,exper_content,exper_updated) values ($uid,$eid,'$exper_content',$timestamp)";
	$db->exec($sql);

	$return_arr = ["uid"=>$uid,"eid"=>$eid,"exper_content"=>$exper_content];

    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
}else{
    echo json_encode(0);
}
