<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$uName = $arr['uname'];
$pwd = $arr['password'];
$phone = $arr['phone'];
$realName_c = $arr['real_name_c'];

$cid = $arr['cid'];
$sid = $arr['sid'];
$gid = $arr['gid'];
$class_id = $arr['class_id'];
$login_type = $arr['login_type'];
$role = $arr['role'];

switch ($role) {
    case 1:
        $realName_p = $arr['real_name_p'];
        $timestamp = mktime();
        $pwd = hash('sha512', $pwd);
        $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status) values ('$realName_p','$pwd',$phone,$timestamp,$timestamp,1,1)");
        $uid_p = $db->lastInsertId();
        $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status) values ('$realName_c','$pwd',$phone,$timestamp,$timestamp,2,1)");
        $uid_c = $db->lastInsertId();

        $db->exec("insert into user_log(uid,updated,descr) values ($uid_p,$timestamp,'p端注册')");
        $db->exec("insert into user_log(uid,updated,descr) values ($uid_c,$timestamp,'p端注册')");
        $db->exec("insert into user_profile(uid,real_name) values ($uid_p,'$realName_p')");
        $db->exec("insert into user_profile(uid,real_name,cid,sid,gid,classid) values ($uid_c,'$realName_c',$cid,$sid,$gid,$class_id)");
        $db->exec("insert into user_location(uid,updated) values ($uid_c,$timestamp)");
        $db->exec("insert into user_location_log(uid,position_x,position_y,updated) values ($uid_c,999,999,$timestamp)");
        $db->exec("insert into user_relation(uid_c,to_uid,relation) values ($uid_c,$uid_p,1) ");
        $db->exec("insert into space_main(uid,updated) values ($uid_c,$timestamp)");

        $return_arr = ["uid_p" => $uid_p, "uid_c" => $uid_c];
        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
        break;

    case 2:

        $timestamp = mktime();
        $pwd = hash('sha512', $pwd);
        $db->exec("insert into user_main(uname,password,phone,created_time,last_login,role,status) values ('$uname','$pwd',$phone,$timestamp,$timestamp,$role,1)");
        $uid = $db->lastInsertId();

        $db->exec("insert into user_log(uid,updated,descr) values ($uid,$timestamp,'c端注册')");
        $db->exec("insert into user_profile(uid,real_name,cid,sid,gid,classid) values ($uid,'$realname_c',$cid,$sid,$gid,$classid)");
        $db->exec("insert into user_location(uid,updated) values ($uid,$timestamp)");
        $db->exec("insert into user_location_log(uid,position_x,position_y,updated) values ($uid,999,999,$timestamp)");
        $db->exec("insert into space_main(uid,updated) values ($uid,$timestamp)");

        $return_arr = ["uid" => (int)$uid];

        include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
        break;

    default:
        echo 0;
        break;
}
	

	