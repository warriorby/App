<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");
include "../include/upload_dir.php";

$uid = $arr['uid'];
$pid = $arr['pid'];

if ($uid != null && $pid != null) {
    $sql = "select * from space_post where uid=$uid and pid=$pid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
    $post = $rs_arr[0]['post'];

    $sql2 = "delete from space_post where uid=$uid and pid=$pid";
    $db->exec($sql2);
    $post_url = $post_upload . $post;
    $post_del = unlink($post_url);

    if ($post_del == true) {
        $return_arr = array("uid" => $uid);
        include_once("../include/return_data.php");
    }else
        echo json_encode(0);
} else {
    echo json_encode(0);
}