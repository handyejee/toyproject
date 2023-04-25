<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB"); //mysql 접속

$sql = "SELECT * FROM topic WHERE id = 19"; 
// $sql = "SELECT * FROM topic 이렇게만 해서 조회하면 전체가 다 조회되기 때문에 데이터가 많을 경우에 비추
// WHERE id = 19 -> id값이 19 인 행을 가져온다 
// DELETE 해도 id 값은 초기화 되지 않나?

$result = mysqli_query($conn, $sql);

// 속성 별 확인 방법
var_dump($result->num_rows); 

$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'<h1>';
echo $row['description'];

