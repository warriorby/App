<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$channel_id = $arr['channelid'];
$uid = $arr['uid'];

if ($uid != null && $channel_id != null) {
    $return_arr = ["uid" => $uid, "channelid" => $channel_id];

    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
} else {
    echo json_encode(0);
}

