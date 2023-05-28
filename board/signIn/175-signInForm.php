<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>

<body>
    <h1>로그인</h1>
    <form name="signIn" method="POST" action="./176-signInProcess.php">
        <table>
            <tr>
                <td><input type="input" id="userID" placeholder="아이디" name="userID"></td>
            </tr>
            <tr>
                <td><input type="password" id="password" placeholder="비밀번호" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="로그인"></td>
            </tr>
        </table>
    </form>
</body>

</html>