<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB"); //mysql 접속

$sql = "SELECT * FROM topic WHERE id = 19"; 
// WHERE id = 19 -> id값이 19 인 행을 가져온다 
// DELETE 해도 id 값은 초기화 되지 않나?

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'<h1>';
echo $row['description'];

