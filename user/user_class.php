<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$cid = $arr['cid'];
$sid = $arr['sid'];
$gid = $arr['gid'];

if ($cid != null && $sid != null && $gid != null) {
    $sql = "select * from grade_list where cid = $cid and sid=$sid and gid=$gid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include_once("../include/return_data.php");
}