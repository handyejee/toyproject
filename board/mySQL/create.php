<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql); //database 서버에 전송하는 api
$list = ''; 
while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=19">MySQL</a></li>
    // mysql 내 아이디가 3인 것 부터 db에서 가져온다
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    //실제 화면 링크 : index.php?id=4
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello WEB!'
);
// print_r($article);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>

<body>
    <h1><a href="index.php"></a></h1>
    <ol>
        <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <form action="process_create.php" method="POST">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
</body>

</html>