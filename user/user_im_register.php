<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$cid = $arr['cid'];
$zid = $arr['zid'];
$sid = $arr['sid'];
$gid = $arr['gid'];
$class_id = $arr['class_id'];
$enter_year = $arr['enter_year'];
$group_sid = $arr['group_sid'];
$group_gid = $arr['group_gid'];
$group_class_id = $arr['group_classid'];
$role = $arr['role'];

$local_group_id = $cid.$zid.$sid.$gid.$class_id.$enter_year;

$sql = "update im_group set group_id='$group_sid' where sid='$sid' and gid='00' and class_id='00'";
$sql2 = "update im_group set group_id='$group_gid' where sid='$sid' and gid='$gid' and class_id='00'";
$sql3 = "update im_group set group_id='$group_class_id' where sid='$sid' and gid='$gid' and class_id='$class_id'";
$sql4 = "update user_im_group set group_sid='$group_sid',group_gid='$group_gid',group_classid='$group_class_id' where uid=$uid_c";
$db->exec($sql);
$db->exec($sql2);
$db->exec($sql3);
$db->exec($sql4);

switch($role){
    case 1:
        $uid_p = $arr['uid_p'];
        $return_arr = array("uid_p"=>$uid_p,"uid_c" => $uid_c,"group_sid"=>$group_sid,"group_gid"=>$group_gid,"group_classid"=>$group_class_id);
        include_once("../include/return_data.php");
        break;
    case 2:
        $uid_c = $arr['uid_c'];
        $return_arr = array("uid_c" => $uid_c,"group_sid"=>$group_sid,"group_gid"=>$group_gid,"group_classid"=>$group_class_id);
        include_once("../include/return_data.php");
        break;
    default:
        echo json_encode(0);
        break;
}


