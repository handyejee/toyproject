<?php
// 유효성 검사 추가 필요
$conn = mysqli_connect("localhost", "root", "root", "livDB");

    if(mysqli_connect_errno()) {
        echo "데이터베이스 접속 실패";
        echo mysqli_connect_error();
    } else {
        echo "데이터베이스 접속 성공<br>";
    }

    $filterArr = array(
    'userID'=>mysqli_real_escape_string($conn, $_POST['userID']),
    'password'=>mysqli_real_escape_string($conn, $_POST['password']),
    );

    $sql = "
        SELECT userID, password FROM member
        WHERE email = '{$_POST['userID']}' AND password = '{$_POST['password']}';
    ";

    $result = mysqli_multi_query($conn, $sql);
    // mysqli_multi_query : 단 한개의 쿼리만 실행하도록 하는 함수
    if ($result === false) {
        echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
        echo "<br>".mysqli_error($conn);
        
    } else {
        echo "성공했습니다. <a href='../170-index.php'>게시판으로 이동하기</a>";
    }

        /* 
            / 절대경로  
            ../ 상위경로 접근
            ./ 현재경로
        */