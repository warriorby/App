<?php
require_once(dirname(dirname(__FILE__)) . "/include/connection.php");
include_once(dirname(dirname(__FILE__)) . "/include/get_data.php");

include_once(dirname(dirname(__FILE__)) . "/include/upload_dir.php");

$uid = $arr['uid'];
$tid = $arr['tid'];
$photo_status = $arr['photo_status'];

$file_types = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/x-png');
$max_file_size = 2000000;
$destination_folder = "upload_img";
$watermark = 1;
$water_type = 1;
$water_position = 1;
$water_string = "www";
$water_img = "png";
$img_preview = 1;
$img_preview_size = 1 / 2;

if($_FILES["file"]["error"] >0){
    echo json_encode(0);
}

if (is_uploaded_file($_FILES["file"]["name"])) {
    $img_name = basename($_FILES["file"]["name"]);
    if (in_array($_FILES["file"]["type"], $file_types)) {
        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);

        $timestamp = mktime();
        $img_new_name = $uid . $timestamp . "@1" . $img_extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $img_upload_large . $img_new_name);

        switch ($photo_status) {
            case 2:
                $sql = "insert into task_picture(tid,uid,picture_start,updated) values ($tid,$uid,'$img_new_name',$timestamp)";
                $db->exec($sql);
                break;
            case 4:
                $sql2 = "insert into task_picture(tid,uid,picture_start,updated) values ($tid,$uid,'$img_new_name',$timestamp)";
                $db->exec($sql2);
                break;
            default:
                echo json_encode(0);
                break;
        }
    }
    $url = $img_upload_large . $img_new_name;
    $return_arr = ["uid" => $uid, "tid" => $tid, "pic_url" =>$url];
    include_once(dirname(dirname(__FILE__)) . "/include/return_data.php");
} else {
    echo json_encode(0);
}



