<?php
require_once("../include/connection.php");
include "../include/get_data.php";

$pid = $arr['pid'];
if (isset($pid)) {
    $sql = "select distinct cid,city from city_list where pid like '$pid'";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}


