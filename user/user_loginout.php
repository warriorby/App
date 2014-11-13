<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$uid = $arr['uid'];

if ($uid) {
    $sql = "update user_main set status = 0 where uid=$uid";
    $db->exec($sql);

    $return_arr = ["uid" => $uid];

    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
} else {
    echo 0;
}
