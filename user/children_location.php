<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$uid = $arr['uid'];
//$location = $arr['location'];
$position_x = $arr['position_x'];
$position_y = $arr['position_y'];

if ($uid != null && $position_x != null && $position_y != null) {
    $timestamp = mktime();
    //	$sql = "update user_location set location='$location', updated=$timestamp where uid=$uid";
    $sql2 = "update user_location_log set position_y=$position_y, position_x=$position_x, updated=$timestamp where uid=$uid ";

    //	$db->exec($sql);
    $db->exec($sql2);

    $return_arr = ["uid" => $uid];

    include_once(dirname(__FILE__) . "/include/return_data.php");
} else {
    echo json_encode(0);
}
