<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'livDB');

// var_dump($_POST); // post 로 데이터가 잘 넘어왔는지 확인

$filterArr = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
    INSERT INTO topic
    (title, description, created)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )
";
// die($sql); // 실행중인 스크립트 종료하고 입력받은 인자를 출력하는 함수
$result = mysqli_multi_query($conn, $sql);
// mysqli_multi_query : 단 한개의 쿼리만 실행하도록 하는 함수
if ($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
    echo mysqli_error($conn);
    
} else {
    echo "성공했습니다. <a href='index.php'>돌아가기</a>";
}

?>