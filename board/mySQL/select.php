<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB"); //mysql ����

$sql = "SELECT * FROM topic WHERE id = 19"; 
// WHERE id = 19 -> id���� 19 �� ���� �����´� 
// DELETE �ص� id ���� �ʱ�ȭ ���� �ʳ�?

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'<h1>';
echo $row['description'];

