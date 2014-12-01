<?php
require "../include/connection.php";

$sql = "select distinct pid,province from city_list";
$rs = $db->query($sql);
$rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

$return_arr = $rs_arr;

include "../include/return_data.php";