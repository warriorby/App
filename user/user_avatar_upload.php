<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");

include_once("../include/upload_dir.php");

$uid = $arr['uid'];

if (!file_exists($avatar_upload)) {
    mkdir("$avatar_upload", 0777);
}
$file_types = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/x-png');

if ($_FILES["filename"]["error"] > 0) {
    echo json_encode(0);
    exit;
}

if (!in_array($_FILES["filename"]["type"], $file_types)) {
    echo json_encode(0);
    exit;
}
if ($_FILES["filename"]["name"]) {
    $avatar_name = basename($_FILES["file"]["name"]);
    $avatar_extension = pathinfo($avatar_name, PATHINFO_EXTENSION);
    $timestamp = mktime();
    $avatar_new_name = $uid . $timestamp . "@A" . $avatar_extension;
    $avatar_url = $avatar_upload . $avatar_new_name;
    move_uploaded_file($_FILES["filename"]["tmp_name"], $avatar_url);

    $sql = "update user_avatar set avatar=$avatar_new_name where uid=$uid";
    $db->exec($sql);

    $return_arr = array("uid" => $uid, "avatar_url" => $avatar_url);
    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}



