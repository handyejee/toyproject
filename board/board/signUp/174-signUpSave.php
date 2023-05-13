<?php
    // include $_SERVER['DOCUMENT_ROOT'].'toyproject/BOARD/board/common/171-session.php';
    // include $_SERVER['DOCUMENT_ROOT'].'/board/connection.php';
    /// $_SERVER['DOCUMENT_ROOT'] : Applications/MAMP/htdocs
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
    'email'=>mysqli_real_escape_string($conn, $_POST['userEmail']),
    'nickname'=>mysqli_real_escape_string($conn, $_POST['userNickname']),
    );

    echo "<pre>";
    print_r($filterArr);
    echo "</pre>";

    $sql = "
        INSERT INTO member
        (userID, password, email, nickname)
        VALUES(
            '{$_POST['userID']}',
            '{$_POST['password']}',
            '{$_POST['userEmail']}',
            '{$_POST['userNickname']}'
        )
    ";

    echo "<xmp>".$sql."</xmp>";
    // die($sql); // 실행중인 스크립트 종료하고 입력받은 인자를 출력하는 함수
    $result = mysqli_multi_query($conn, $sql);
    echo   $result;
    // mysqli_multi_query : 단 한개의 쿼리만 실행하도록 하는 함수
    if ($result === false) {
        echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
        error_log(mysqli_error($conn));
        
    } else {
        echo "성공했습니다. <a href='170-index.php'>로그인 하러 가기</a>";
    }