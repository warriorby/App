<?php
require_once('medoo.php');
//@header("Content-type: text/html;charset=UTF-8");
//require_once("../BOM_del.php");
$dsn = 'mysql:host=localhost;dbname=demo2';
$user = 'root';
$password = '123456';
try{
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('set names utf8');
   // echo "连接成功！";
}catch(Exception $e){
    die("-404");
}