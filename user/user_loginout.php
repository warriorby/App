<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];

if ($uid) {
    $sql = "update user_main set status = 0 where uid=$uid";
    $db->exec($sql);

    $return_arr = array("uid" => $uid);

    include_once("../include/return_data.php");
} else {
    echo 0;
}
