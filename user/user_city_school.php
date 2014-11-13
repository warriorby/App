<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data,php");

$uid = $arr['uid'];
$cid = $arr['cid'];

if ($uid != null && $cid != null) {
    $sql = "select * from school_list where cid = $cid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;

    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
}