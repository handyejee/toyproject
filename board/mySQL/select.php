<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB"); //mysql ����

$sql = "SELECT * FROM topic WHERE id = 19"; 
// $sql = "SELECT * FROM topic �̷��Ը� �ؼ� ��ȸ�ϸ� ��ü�� �� ��ȸ�Ǳ� ������ �����Ͱ� ���� ��쿡 ����
// WHERE id = 19 -> id���� 19 �� ���� �����´� 
// DELETE �ص� id ���� �ʱ�ȭ ���� �ʳ�?

$result = mysqli_query($conn, $sql);

// �Ӽ� �� Ȯ�� ���
var_dump($result->num_rows); 

$row = mysqli_fetch_array($result);

echo '<h1>'.$row['title'].'<h1>';
echo $row['description'];

