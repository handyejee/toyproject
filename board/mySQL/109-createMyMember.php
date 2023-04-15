<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "CREATE TABLE myMember(
    myMemberID INT UNSIGNED AUTO_INCREMENT COMMENT '고객의 고유번호',
    userID VARCHAR(15) NOT NULL COMMENT '고객의 아이디',
    name VARCHAR(10) NOT NULL COMMENT '고객명',
    password VARCHAR(30) NOT NULL COMMENT '고객의 비밀번호',
    phone VARCHAR(13) NOT NULL COMMENT '고객의 휴대전화 번호',
    email VARCHAR(30) NOT NULL COMMENT '고객의 이메일 주소',
    birthDay CHAR(10) NOT NULL COMMENT '고객의 생일',
    gender ENUM('m', 'w', 'x') DEFAULT 'x' COMMENT '고객 성별',
    regTime DATETIME NOT NULL COMMENT '회원가입 시간',
    PRIMARY KEY(myMemberID));";
    $res = $dbConnect->query($sql);

    if ($res) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }  
?>