<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
</head>

<body>
    <h1>회원가입</h1>
    <h3>행복한 게시판이에요</h3>
    <form name="signUp" method="POST" action="./174-signUpSave.php">
        <table>
            <tr>
                <td>
                    아이디
                </td>
                <td>
                    <input type="text" name="userID" required />
                </td>
            </tr>
            <tr>
                <td>
                    비밀번호
                </td>
                <td>
                    <input type="password" name="password" required />
                </td>
            </tr>
            <tr>
                <td>
                    이메일
                </td>
                <td>
                    <input type="email" name="userEmail" required />
                </td>
            </tr>
            <tr>
                <td>
                    닉네임
                </td>
                <td>
                    <input type="text" name="userNickname" required />
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="가입하기" /></td>
            </tr>
        </table>

</body>

</html>