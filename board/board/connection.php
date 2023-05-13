<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");

if(mysqli_connect_errno()) {
    echo "데이터베이스 접속 실패";
}
?>