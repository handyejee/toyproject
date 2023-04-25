<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB"); //mysql 접속

echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 6"; 
// $sql = "SELECT * FROM topic 이렇게만 해서 조회하면 전체가 다 조회되기 때문에 데이터가 많을 경우에 비추
// WHERE id = 19 -> id값이 19 인 행을 가져온다 
// DELETE 해도 id 값은 초기화 되지 않나? -> Unique id 이기 때문에 Delete 이후에도 Index는 돌아오지 않는다.

$result = mysqli_query($conn, $sql);

// 속성 별 확인 방법
// var_dump($result->num_rows); 

$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'<h1>'; // 연관배열
echo $row['description'];

//multiple row
echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic"; 
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'<h2>'; // 연관배열
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'<h2>'; // 연관배열
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'<h2>'; // 연관배열
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'<h2>'; // 연관배열
echo $row['description'];

$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'<h2>'; // 연관배열
echo $row['description'];

$row = mysqli_fetch_array($result);
var_dump($row);
// 가져올 행이 없으면 null 값을 반환
// mysqli_fetch_array 순서대로 table 내 데이터 가져옴