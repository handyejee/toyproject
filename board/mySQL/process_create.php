<?php
var_dump($_POST); // post �� �����Ͱ� �� �Ѿ�Դ��� Ȯ��

$sql = "
    INSERT INTO topic
    (title, description, created)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )

";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo "�����ϴ� �������� ������ ������ϴ�. �����ڿ��� �����ϼ���.";
    error_log(mysqli_error($conn));
} else {
    echo "�����߽��ϴ�. <a href='index.php'>���ư���</a>";
}

?>