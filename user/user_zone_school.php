<?php
require("../include/conn.php");
require("../include/get_data.php");

$zid = $arr['zid'];
if (isset($zid)) {
    $rs_arr = $d2b->select("school_list",["sid","school"],["zid"=>$zid]);
    $return_arr = $rs_arr;
    /*$return_arr=[["sid"=>"001","school"=>"建平中学"]];*/
    include("../include/return_data.php");
}else{
    echo json_encode(0);
}