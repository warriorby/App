<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$cid = $arr['cid'];
$sid = $arr['sid'];

if ($cid != null) {
    $sql = "select * from grade_list where cid = $cid and sid=$sid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;

    include_once("../include/return_data.php");
}