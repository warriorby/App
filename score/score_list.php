<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid_p'];

	if(isset($uid)){
		$sql = "select * from score_main where uid=$uid";
		$rs = $db->query($sql);
		$return_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
	}else{
        echo json_encode(0);
	}
?>