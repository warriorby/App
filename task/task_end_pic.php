<?php
require_once("../include/connection.php");
include_once("../include/get_data.php");
include_once("../include/upload_dir.php");

$uid = $arr['uid'];
$tid = $arr['tid'];
$photo_status = $arr['photo_status'];

if (!file_exists($img_upload)) {
    mkdir("$img_upload", 0777);
}
if ($_FILES["filename"]["error"] > 0) {
    echo json_encode(0);
    exit;
}
$file_types = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/x-png');
if (!in_array($_FILES["filename"]["type"], $file_types)) {
    echo json_encode(0);
    exit;
}

if ($_FILES["filename"]["name"]) {
    $img_name = basename($_FILES["filename"]["name"]);
    $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);

    $timestamp = mktime();
    $img_new_name = $uid . $timestamp . "@P" . $img_extension;
    $img_url = $img_upload . $img_new_name;
    move_uploaded_file($_FILES["filename"]["tmp_name"], $img_url);

    switch ($photo_status) {
        case 3:
            $sql = "insert into task_picture(tid,uid,picture_end,updated) values ($tid,$uid,'$img_new_name',$timestamp)";
            $db->exec($sql);
            break;
        case 4:
            $sql2 = "update task_picture set picture_end=$picture_end, updated=$timestamp where tid=$tid and uid=$uid";
            $db->exec($sql2);
            break;
        default:
            echo json_encode(0);
            break;
    }

    $return_arr = array("uid" => $uid, "tid" => $tid, "pic_url" => $img_url);
    include_once("../include/return_data.php");
} else {
    echo json_encode(0);
}




