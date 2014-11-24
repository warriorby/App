<?php
    require_once("../include/connection.php");

    $sql = "select * from city_list";

    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;

include_once("../include/return_data.php");


