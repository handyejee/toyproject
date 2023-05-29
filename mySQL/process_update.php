<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'livDB');

// var_dump($_POST); // post 로 데이터가 잘 넘어왔는지 확인

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

settype($_POST['id'], 'integer');
$filterArr = array(
    /* 
    process_create.php 에서 생성할때는 Id 값이없어서 id값에 대한 고려가 필요 없는데
    update 할때는 Url에 ?id= 로 있기 때문에 id 값에 대한 처리도 필요하다!
    */
    'id'=>mysqli_real_escape_string($conn, $id),
    'title'=>mysqli_real_escape_string($conn, $title),
    'description'=>mysqli_real_escape_string($conn, $description)
); 

$sql = "
    UPDATE topic
    SET
        title = '{$filterArr['title']}',
        description = '{$filterArr['description']}'
    WHERE
        id = {$filterArr['id']}
";
// die($sql); // 실행중인 스크립트 종료하고 입력받은 인자를 출력하는 함수

$result = mysqli_multi_query($conn, $sql);
// mysqli_multi_query : 단 한개의 쿼리만 실행하도록 하는 함수
if ($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
    echo mysqli_error($conn);
    
} else {
    echo "수정에 성공했습니다. <a href='index.php'>게시판 목록으로 돌아가기</a>";
}

?>