<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$phone = $arr['phone'];
$pwd = $arr['password'];
$login_type = $arr['login_type'];
$channel_id = $arr['channelid'];
$role = $arr['role'];

$sql = "select * from user_main where phone=$phone and role=$role";
$result = $db->query($sql);
$rs_arr = $result->fetchAll(PDO::FETCH_ASSOC);
if ($rs_arr) {
    switch ($login_type) {
        case 2:
            $uid_p = $rs_arr[0]['uid'];
            $timestamp = mktime();
            $db->exec("update user_main set last_login = $timestamp,channelid='$channel_id' where uid = $uid_p ");

            $rs2 = $db->query("select * from user_main where uid=$uid_p");
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $uname = $rs2_arr[0]['uname'];
            $phone = $rs2_arr[0]['phone'];
           // $role = $rs2_arr[0]['role'];

            $rs3 = $db->query("select * from user_profile where uid=$uid_p");
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $real_name_p = $rs3_arr[0]['real_name'];

            $return_arr = array('uid_p' => $uid_p, 'uname' => $uname, 'phone' => $phone, 'role' => $role, 'real_name_p' => $real_name_p,"channelid"=>$channel_id);
            include_once("../include/return_data.php");
            break;
        case 1:
            $uid_c = $rs_arr[0]['uid'];
            $timestamp = mktime();
            $db->exec("update user_main set last_login = $timestamp,channelid='$channel_id' where uid = $uid_c");

            $rs2 = $db->query("select * from user_main where uid=$uid_c");
            $rs2_arr = $rs2->fetchAll(PDO::FETCH_ASSOC);
            $uname = $rs2_arr[0]['uname'];
            $phone = $rs2_arr[0]['phone'];
           // $role = $rs2_arr[0]['role'];

            $rs3 = $db->query("select * from user_profile where uid=$uid_c");
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $real_name_c = $rs3_arr[0]['real_name'];

            $rs4 = $db->query("select * from user_education where uid=$uid_c");
            $rs4_arr = $rs4->fetchAll(PDO::FETCH_ASSOC);
            $cid = $rs4_arr[0]['cid'];
            $zid = $rs4_arr[0]['zid'];
            $sid = $rs4_arr[0]['sid'];
            $gid = $rs4_arr[0]['gid'];
            $class_id = $rs4_arr[0]['class_id'];

            $rs5 = $db->query("select * from user_im_group where uid = $uid_c");
            $rs5_arr = $rs5->fetchAll(PDO::FETCH_ASSOC);
            $group_sid = $rs5_arr[0]['group_sid'];
            $group_gid = $rs5_arr[0]['group_gid'];
            $group_class_id = $rs5_arr[0]['group_classid'];

            $return_arr = array('uid_c' => $uid_c, 'uname' => $uname, 'phone' => $phone, 'role' => $role, 'real_name_c' =>$real_name_c, 'cid' => $cid,
                'sid' => $sid, 'gid' => $gid, 'class_id' => $class_id, 'group_sid' => $group_sid, 'group_gid' => $group_gid, 'group_classid' => $group_class_id,"channelid"=>$channel_id);
            include_once("../include/return_data.php");
            break;
        default:
            echo json_encode(0);
            break;
    }
} else {
    echo json_encode(0);
}
