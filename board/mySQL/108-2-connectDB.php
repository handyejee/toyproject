<?php
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "livDB";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    if(mysqli_connect_errno()) {
        echo "데이터베이스 {$dbName}에 접속 실패";
    }
     