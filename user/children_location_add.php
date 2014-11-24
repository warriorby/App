<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$position_x = $arr['position_x'];
$position_y = $arr['position_y'];

if ($uid != null && $position_x != null && $position_y != null) {
    $timestamp = mktime();
    $sql2 = "update user_location_log set position_y=$position_y, position_x=$position_x, updated=$timestamp where uid=$uid ";

    $db->exec($sql2);

    $return_arr = array("uid" => $uid);

    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}
