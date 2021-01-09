<?php
    $server = "localhost";
    $user = "root";
    $password = "123";

    $mysqli = new mysqli($server,$user,$password);
    if(mysqli_connect_errno()){
        echo "连接数据库失败".mysqli_connect_error();
        exit();
    }
    $result = $mysqli->query('set names utf8');
?>