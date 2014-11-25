<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

	$uid = $arr['uid'];
	//$status = $arr['status'];
	//$count_get = $arr['count'];

	$return_arr = array();

	if(isset($uid)){
		$sql = "select * from task_main where uid=$uid and date(FROM_UNIXTIME(start_time)) = curdate()";
		$rs = $db->query($sql);

		/*foreach($rs as $row){
			$sub_arr = array();
			$sub_arr['uid']=$row['uid'];

			$return_arr[] = $sub_arr;
			$count_return=count($sub_arr['uid']);
		}*/
        $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        $return_arr = $rs_arr;

        include_once("../include/return_data.php");
	}else{
        echo json_encode(0);
	}
