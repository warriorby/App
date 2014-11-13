<?php
    require_once(dirname(dirname(__FILE__))."/include/connection.php");

   include_once(dirname(dirname(__FILE__))."/include/get_data.php");

    $sql = "select * from city_list";

    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;

    include_once(dirname(dirname(__FILE__))."include/return_data.php");


