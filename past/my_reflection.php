<?php
require "../include/connection.php";
include "../include/get_data.php";

$uid = $arr['uid'];
$role = $arr['role'];
if ($uid != null && $role !=null) {
    switch($role){
        case 1:
            $sql3 = "select * from user_relation where to_uid=$uid";
            $rs3 = $db->query($sql3);
            $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
            $uid_c = $rs3_arr[0]['uid_c'];

            $sql = "select * from  user_main where uid=$uid_c";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $gold = $rs_arr[0]['gold'];
            $return_arr = ['uid'=>$uid_c,'gold'=>$gold];
            break;
        case 2:
            $sql = "select * from  user_main where uid=$uid";
            $rs = $db->query($sql);
            $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
            $gold = $rs_arr[0]['gold'];
            $return_arr = ['uid'=>$uid,'gold'=>$gold];
            break;
        default:
            echo json_encode(0);
            break;
    }
    include "../include/return_data.php";
}else{
    echo json_encode(0);
}