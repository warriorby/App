<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$role = $arr['role'];

switch($role){
    case 1:
        $uid_p = $arr['uid_p'];
        $sql = "select * from user_main where uid=$uid_p";
        $rs = $db->query($sql);
        $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        $channel_id = $rs_arr[0]['channelid'];
        $return_arr = array("uid_P" => $uid_P, "channelid" => $channel_id);
        include_once("../include/return_data.php");
        break;
    case 2:
        $uid_c = $arr['uid_c'];
        $sql = "select * from user_main where uid=$uid_c";
        $rs = $db->query($sql);
        $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
        $channel_id = $rs_arr[0]['channelid'];
        $return_arr = array("uid_c" => $uid_c, "channelid" => $channel_id);
        include_once("../include/return_data.php");
        break;
    default:
        echo json_encode(0);
        break;
}


