<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

$uid = $arr['uid'];

if($uid != null){
    $sql="select * from task_profile where uid=$uid";
    $sql2 = "select * from task_main where uid=$uid and status=3";


}