<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql); //database 서버에 전송하는 api
//mysqli_fetch_array : result set 에서 가지고 온 데이터를 하나씩 리턴
$i = 1;
$list = '';
$escaped_title = '';
$createDate = '';

while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=19">MySQL</a></li>
    // mysql 내 아이디가 3인 것 부터 db에서 가져온다
    // $escaped_title = $escaped_title.htmlspecialchars($row['title'])."<br>";

    $list = $list."<div>".$i++."</div>";
    $escaped_title = $escaped_title."<a href=\"index.php?id={$row['id']}\">".htmlspecialchars($row['title'])."</a><br>";
    $createDate = $createDate.$row['created']."<br>";
    // $list = $list."<li><a href=\"index.php?id={$row['id']}\"></li>";

    // echo "<pre>";
    // print_r($row);
    // echo "</pre><br> \$result";
    // print_r($result);


    // $title = {$escaped_title}</a>{$createDate};
    // $createDate = ;
    //실제 화면 링크 : index.php?id=4
    // TODO : 리스트 반복문 안에 넣어서 보여줘야 됨 
}


$article = array(
    'title'=>'Welcome',
    'description'=>'Hello WEB!'
);

$update_link = '';
$delete_link = '';
$getID = $_GET['id'];

// get 으로 보내고 있는데 post 
if (isset($getID)) {
    $filtered_id = mysqli_real_escape_string($conn, $getID); //sql injection을 막아준다.
    $sql = "SELECT * FROM topic WHERE id= $getID";
    $result = mysqli_query($conn, $sql); // db에 쿼리 보내는
    $row = mysqli_fetch_array($result); // 앞에 title 값을 가져왔던거와는 달리 id값을 primary key로 설정했기 때문에 반복할 필요 없다.
    
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

    $update_link = '<a href="update.php?id='.$getID.'">update</a>';

    // Delete는 form 으로 처리하는 것이 안전하다
    $delete_link = '
    <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$getID.'">
        <input type="submit" value="delete">
    </form>
    ';

    
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
    <style>
    /* * {
        margin: 0;
        padding: 0;
    } */

    table {
        border: 1px solid #444444;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #444444;
    }
    </style>
</head>

<body>
    <!-- <h1><a href="index.php"></a></h1> 이 부분 왜 필요 한거지 ?-->
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

    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
</body>

</html>