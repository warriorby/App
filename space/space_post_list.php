<?php
require("../include/connection.php");
require("../include/get_data.php");

$uid = $arr['uid'];
if ($uid != null) {
    $sql = "select * from space_post where uid=$uid";
    $rs = $db->query($sql);
    $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);

    $return_arr = $rs_arr;
    require("../include/return_data.php");
} else {
    echo json_encode(0);
}
