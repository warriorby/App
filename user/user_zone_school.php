<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$cid = $arr['cid'];
$zid = $arr['zid'];

if ($cid != null && $zid != null) {
    $sql = "select sid,school from school_list where cid='$cid' and zid='$zid'";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}