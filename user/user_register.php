<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uName = $arr['uname'];
$pwd = $arr['password'];
$phone = $arr['phone'];
$cid = $arr['cid'];//021
$zid = $arr['zid'];//01
$sid = $arr['sid'];//001
$gid = $arr['gid'];//01
$class_id = $arr['class_id'];//01
$enter_year = $arr['enter_year'];//2014
$login_type = $arr['login_type'];
$channel_id = $arr['channelid'];
$realName_c = $arr['real_name_c'];

$rs = $db->query("select * from im_group where sid='$sid' and gid='00' and class_id='00'");
$rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
$group_sid = $rs_arr[0]['group_id'];

$rs2 = $db->query("select * from im_group where sid='$sid' and gid='$gid' and class_id='00'");
$rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
$group_gid = $rs_arr2[0]['group_id'];

$rs3 = $db->query("select * from im_group where sid='$sid' and gid='$gid' and class_id='$class_id'");
$rs_arr3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
$group_class_id = $rs_arr3[0]['group_id'];

$rs4 = $db->query("select * from user_main where phone=$phone");
$rs4_arr = $rs4->fetchAll(PDO::FETCH_ASSOC);
if (count($rs4_arr)==0) {
    switch ($login_type) {
        case 2:
            $realName_p = $arr['real_name_p'];
            $timestamp = mktime();
            $pwd = hash('sha512', $pwd);
            $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status,channelid) values ('$realName_p','$pwd',$phone,$timestamp,$timestamp,1,1,'$channel_id')");
            $uid_p = $db->lastInsertId();
            $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status) values ('$realName_c','$pwd',$phone,$timestamp,$timestamp,2,1)");
            $uid_c = $db->lastInsertId();

            $db->exec("insert into user_log(uid,updated,descr) values ($uid_p,$timestamp,'p端注册')");
            $db->exec("insert into user_log(uid,updated,descr) values ($uid_c,$timestamp,'p端注册')");
            $db->exec("insert into user_profile(uid,real_name) values ($uid_p,'$realName_p')");
            $db->exec("insert into user_profile(uid,real_name) values ($uid_c,'$realName_c')");
            $db->exec("insert into user_education(uid,cid,zid,sid,gid,class_id,enter_year) values ($uid_c,'$cid','$zid','$sid','$gid','$class_id','$enter_year')");
            $db->exec("insert into user_im_group(uid,group_sid,group_gid,group_classid) values ($uid_c,'$group_sid','$group_gid','$group_class_id')");
            $db->exec("insert into user_location(uid,updated) values ($uid_c,$timestamp)");
            $db->exec("insert into user_location_log(uid,position_x,position_y,updated) values ($uid_c,999,999,$timestamp)");
            $db->exec("insert into user_relation(uid_c,to_uid,relation) values ($uid_c,$uid_p,1) ");
            $db->exec("insert into space_main(uid,updated) values ($uid_c,$timestamp)");
            $db->exec("insert into user_avatar(uid,updated) values ($uid_p,$timestamp)");
            $db->exec("insert into user_avatar(uid,updated) values ($uid_c,$timestamp)");

            $return_arr = array("uid_p" => $uid_p, "uid_c" => $uid_c, "group_sid" => $group_sid, "group_gid" => $group_gid, "group_classid" => $group_class_id, "role" => 1);
            include_once("../include/return_data.php");
            break;
        case 1:

            $timestamp = mktime();
            $pwd = hash('sha512', $pwd);
            $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status,channelid) values ('$uName','$pwd',$phone,$timestamp,$timestamp,2,1,'$channel_id')");
            $uid_c = $db->lastInsertId();

            $db->exec("insert into user_log(uid,updated,descr) values ($uid_c,$timestamp,'c端注册')");
            $db->exec("insert into user_profile(uid,real_name) values ($uid_c,'$realName_c')");
            $db->exec("insert into user_education(uid,cid,zid,sid,gid,class_id,enter_year) values ($uid_c,'$cid','$zid','$sid','$gid','$class_id','$enter_year')");

            $db->exec("insert into user_location(uid,updated) values ($uid_c,$timestamp)");
            $db->exec("insert into user_location_log(uid,position_x,position_y,updated) values ($uid_c,999,999,$timestamp)");
            $db->exec("insert into space_main(uid,updated) values ($uid_c,$timestamp)");
            $db->exec("insert into user_avatar(uid,updated) values ($uid_c,$timestamp)");

            $return_arr = array("uid_p" =>"", "uid_c" => $uid_c, "group_sid" => $group_sid, "group_gid" => $group_gid, "group_classid" => $group_class_id, "role" => 2);
            include_once("../include/return_data.php");
            break;
        default:
            echo json_encode(0);
            break;
    }
} else {
    echo json_encode(0);
}

	