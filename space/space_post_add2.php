<?php
require("../include/connection.php");
require("../include/get_data.php");
require "../include/upload_dir.php";

$uid = $arr['uid'];
$post_name = $arr['post_name'];

if($uid != null && $post_name != null){
    //$post_name = substr($post_url,16);
    $timestamp = time();
    $sql2 = "insert into space_post(uid,post,updated) values ($uid,'$post_name',$timestamp)";
    $db->exec($sql2);

    $return_arr = ['uid'=>$uid,"post_name"=>$post_name];
    include "../include/return_data.php";
}
