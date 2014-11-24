<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

$uid = $arr['uid'];
$role = $arr['role'];

if($uid != null && $role != null){
    $sql = "select * from user_main where uid=$uid and role=$role";
    $rs = $db->query($sql);
    $rs_arr= $rs->fetchAll(PDO::FETCH_ASSOC);

    $uid = $rs_arr[0]['uid'];
    $role = $rs_arr[0]['role'];
    $balance = $rs_arr[0]['balance'];

    $return_arr = array("uid"=>$uid, "role"=>$role, "balance"=>$balance);
    include_once("../include/return_data.php");
}else{
    echo json_encode(0);
}