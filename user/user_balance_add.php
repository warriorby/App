<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$role = $arr['role'];
$type = $arr['balance_type']; //0:30/月；1:168/半年；2:298/一年

if ($uid != null && $role != null && $type != null) {
    switch ($type) {
        case 1:
            $sql = "update user_main set balance=balance+30 where uid = $uid and role=$role";
            $db->exec($sql);
            break;
        case 2:
            $sql2 = "update user_main set balance=balance+168 where uid=$uid and role=$role";
            $db->exec($sql2);
            break;
        case 3:
            $sql3 = "update user_main set balance=balance+298 where uid=$uid and role=$role";
            $db->exec($sql3);
            break;
        default:
            echo json_encode(0);
            break;
    }
    $return_arr = array("uid" => $uid, "role" => $role);
    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}