<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql); //database 서버에 전송하는 api
$list = ''; 
while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=19">MySQL</a></li>
    // mysql 내 아이디가 3인 것 부터 db에서 가져온다
    $list = $list."<div>".$i++."</div>";
    $escaped_title = $escaped_title."<a href=\"update.php?id={$row['id']}\">".htmlspecialchars($row['title'])."</a><br>";
    $createDate = $createDate.$row['created']."<br>";

    //실제 화면 링크 : index.php?id=4
//     $escaped_title = htmlspecialchars($row['title']);
//     $createDate = $row['created'];
//     $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a>{$createDate}</li>";
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello WEB!'
);

$update_link = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); //sql injection을 막아준다.
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql); // db에 쿼리 보내는
    $row = mysqli_fetch_array($result); // 앞에 title 값을 가져왔던거와는 달리 id값을 primary key로 설정했기 때문에 반복할 필요 없다.
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
    

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
    <table>
        <tr>
            <td>번호</td>
            <td>제목</td>
            <td>수정일</td>
        </tr>
        <tr>
            <td>
                <?= $list ?>
            </td>
            <td>
                <?=$escaped_title?>
            </td>
            <td>
                <?=$createDate ?>
            </td>
        </tr>
    </table>
    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p>
            <input type="text" name="title" placeholder="title" value="<?=$article['title']?>">
        </p>
        <p>
            <textarea name="description" placeholder="description"><?=$article['description']?></textarea>
            <?=$article['description']?>
        </p>
        <p>
            <input type="submit">
        </p>
</body>

</html>