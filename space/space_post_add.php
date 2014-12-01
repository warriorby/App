<?php
require "../include/upload_dir.php";

if (!file_exists($post_upload)) {
    mkdir($post_upload, 0700);
}
/*if ($_FILES["filename"]["error"] > 0) {
    echo json_encode(0);
    exit;
}
$file_types = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/x-png');
if (!in_array($_FILES["filename"]["type"], $file_types)) {
    echo json_encode(0);
    exit;
}*/
if ($_FILES["filename"]["name"]) {
    $img_name = basename($_FILES["filename"]["name"]);
    $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $post_new_name = $timestamp . "@P." . $img_extension;
    $post_url = $post_upload . $post_new_name;
    move_uploaded_file($_FILES["filename"]["tmp_name"], $post_url);

    echo $post_new_name;
}
