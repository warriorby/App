<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];

if ($uid != null) {
    $timestamp = time();
    $sql2 = "select * from user_location_log where uid=$uid ";

    $rs=$db->query($sql2);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $position_x = $rs_arr[0]['position_x'];
    $position_y = $rs_arr[0]['position_y'];

    $return_arr = array("uid" => $uid,"position_x"=>$position_x,"position_y"=>$position_y);

    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}
