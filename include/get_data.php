<?php
    $json_str=$_POST["data"];
    //$json_str=$_GET["data"];
    $arr = @json_decode($json_str,ture);
