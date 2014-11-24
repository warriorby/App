<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$get_posts = $arr['posts'];
$get_expers = $arr['expers'];

if ($uid != null) {
    $sql = "select * from space_main where uid=$uid";
    $sql2 = "select * from user_profile where uid=$uid";
    $sql3 = "select * from space_profile where uid=$uid";

    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $avatar = $rs_arr[0]['avatar'];

    $rs2 = $db->query($sql2);
    $rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
    $real_name = $rs_arr2[0]['real_name'];
    $cid = $rs_arr2[0]['cid'];
    $sid = $rs_arr2[0]['sid'];
    $gid = $rs_arr2[0]['gid'];
    $classid = $rs_arr2[0]['classid'];

    $rs3 = $db->query($sql3);
    $rs_arr3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
    $return_posts = count($rs_arr3[0]['post_url']);
    $return_expers = count($rs_arr3[0]['exper_content']);

    $return_arr =array("uid" => $uid, "posts" => $return_posts, "expers" => $return_expers, "avatar" => $avatar, "real_name_c" => $real_name, "cid" => $cid, "sid" => $sid, "gid" => $gid, "classid" => $classid);

    include_once("../include/return_data.php");
} else {
    echo 0;
}
