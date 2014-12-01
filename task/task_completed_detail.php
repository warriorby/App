<?php
require("../include/connection.php");
require("../include/get_data.php");

	$uid = $arr['uid'];
	$tid = $arr['tid'];
    $role = $arr['role'];
	if($uid != null && $tid != null && $role !=null){
        switch($role){
            case 1:
                $sql3 = "select * from user_relation where to_uid=$uid";
                $rs3 = $db->query($sql3);
                $rs3_arr = $rs3->fetchAll(PDO::FETCH_ASSOC);
                $uid_c = $rs3_arr[0]['uid_c'];

                $sql = "select * from task_main where uid=$uid_c and tid=$tid";
                $sql2 = "select * from task_profile where uid=$uid_c and tid=$tid";
                $sql3 = "select * from task_picture where uid=$uid_c and tid=$tid";

                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $real_time = $rs_arr[0]['real_time'];
                $rest_time = $rs_arr[0]['rest_time'];
                $comment = $rs_arr[0]['comment'];
                $star_level = $rs_arr[0]['star_level'];

                $rs2 = $db->query($sql2);
                $rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                $tname = $rs_arr2[0]['tname'];

                $rs3 = $db->query($sql3);
                $rs_arr3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
                $picture_start = $rs_arr3[0]['picture_start1'];
                $picture_end = $rs_arr3[0]['picture_end1'];

                $return_arr = array("uid"=>$uid_c, "tid"=>$tid, "real_time"=>$real_time, "rest_time"=>$rest_time, "tname"=>$tname, "picture_start"=>$picture_start, "picture_end"=>$picture_end,

                    "comment"=>$comment, "star_level"=>$star_level);
                break;
            case 2:
                $sql = "select * from task_main where uid=$uid and tid=$tid";
                $sql2 = "select * from task_profile where uid=$uid and tid=$tid";
                $sql3 = "select * from task_picture where uid=$uid and tid=$tid";

                $rs = $db->query($sql);
                $rs_arr = $rs->fetchAll(PDO::FETCH_ASSOC);
                $real_time = $rs_arr[0]['real_time'];
                $rest_time = $rs_arr[0]['rest_time'];
                $comment = $rs_arr[0]['comment'];
                $star_level = $rs_arr[0]['star_level'];

                $rs2 = $db->query($sql2);
                $rs_arr2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                $tname = $rs_arr2[0]['tname'];

                $rs3 = $db->query($sql3);
                $rs_arr3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
                $picture_start = $rs_arr3[0]['picture_start1'];
                $picture_end = $rs_arr3[0]['picture_end1'];

                $return_arr = array("uid"=>$uid, "tid"=>$tid, "real_time"=>$real_time, "rest_time"=>$rest_time, "tname"=>$tname, "picture_start"=>$picture_start, "picture_end"=>$picture_end,

                    "comment"=>$comment, "star_level"=>$star_level);
                break;
            default:
                echo json_encode(0);
                break;
        }
        include("../include/return_data.php");
	}else{
        echo json_encode(0);
	}