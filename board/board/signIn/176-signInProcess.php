<?php
// 유효성 검사 추가 필요
$conn = mysqli_connect("localhost", "root", "root", "livDB");

    if(mysqli_connect_errno()) {
        echo "데이터베이스 접속 실패";
        echo mysqli_connect_error();
    } else {
        echo "접속 성공";
    }

    $filterArr = array(
    'userID'=>mysqli_real_escape_string($conn, $_POST['userID']),
    'password'=>mysqli_real_escape_string($conn, $_POST['password']),
    );

    $sql = "
        SELECT userID, FROM member
        (userID, password, email, nickname)
        VALUES(
            '{$_POST['userID']}',
            '{$_POST['password']}',
            '{$_POST['userEmail']}',
            '{$_POST['userNickname']}'
        )
    ";