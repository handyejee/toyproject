<?php
    include $_SERVER['DOCUMENT_ROOT'].'board/common/171-session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>안녕하세요?</title>
</head>

<body>
    <?
if (!isset($_SESSION['memberID'])) {
?>
    <table>
        <tr>
            <td>
                <a href="signUP/173-signUpForm.php">회원가입</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="signUP/173-signUpForm.php">로그인</a>
            </td>
        </tr>

        <?
} else {
?>
        <tr>
            <td>
                <a href="board/183-list.php">게시판</a>
            </td>
        </tr>
    </table>
    <?
    }
    ?>
</body>

</html>