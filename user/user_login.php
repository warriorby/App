<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");

include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

if (count($arr) != 0) {

    $phone = $arr['phone'];
    $pwd = $arr['password'];
    $login_type = $arr['login_type'];
    //$uname = $arr['uname'];

    $sql = "select * from user_main where phone=$phone";

    $result = $db->query($sql);
    $rs_arr = $result->fetchAll(PDO::FETCH_ASSOC);
    //print_r($rs_arr);

    $uid = $rs_arr[0]['uid'];

    if ($uid) {
        $pwd_check = $rs_arr[0]['password'];

        if ($pwd_check) {
            $timestamp = mktime();
            $db->exec("update user_main set last_login = $timestamp where uid = $uid ");

            $return_arr = ["uid" => (int)$uid];

            include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}
