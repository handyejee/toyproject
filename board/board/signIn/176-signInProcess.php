<?php
 // @todo 유효성 검사 추가 필요
    // DB접속
    $conn = mysqli_connect("localhost", "root", "root", "livDB");
    $session = session_start();
    
    // db 접속 여부 판단
    // if(mysqli_connect_errno()) {
    //     echo "데이터베이스 접속 실패";
    //     echo mysqli_connect_error();
    // } else {
    //     echo "데이터베이스 접속 성공<br>";
    // }

    // 아이디, 비밀번호 입력값 처리
    $id_client = $_POST['userID'];
    $pw_client = $_POST['password'];

    $userID = $_POST['userID'];
    $password = $_POST['password'];

    // sql injection 막기 위해 처리
    $filterArr = array(
    'userID'=>mysqli_real_escape_string($conn, $_POST['userID']),
    'password'=>mysqli_real_escape_string($conn, $_POST['password']),
    );

    $pw = hash('sha256', $password); // 회원가입할때 암호화 한 비밀번호와 같은 값이 되도록 암호화
    // echo $pw;
    
    // TODO: $password 값 hash 값으로 넘겨줘야 됨 (회원가입 같이 바꾸기)
    $sql = "
        SELECT password, nickname FROM member
        WHERE userID = '$userID';
    ";
    
    echo $sql."<br>";

    $result = mysqli_query($conn, $sql);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    $num_match = mysqli_num_rows($result);
    printf('%d', $num_match);
    
    if ($userID == null || $password == null) {
        echo "
            <script>
            window.alert('아이디와 비밀번호를 입력해주세요.')
            location.href='./175-signInForm.php';
            </script>

        ";
        // exit;
    }

    // 아이디와 비밀번호가 db에 저장된 값과 일치하지 않을 경우
    if(!$num_match) { 
        echo "
            <script>
            window.alert('아이디 또는 비밀번호가 일치하지 않습니다.')
            location.href='./175-signInForm.php';
            </script>
        ";
        exit;
        
    }else {
        $row = mysqli_fetch_array($result); //mysql에서 array 형태로 가져오는것
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        $db_pass = $row['password'];

        // mysqli_close($conn); // 필요한 데이터를 다 가져와서 세션이 더이상 연결될 필요가 없음
        // if(!password_verify($password, $db_pass)) {
        
        if ($password != $db_pass) {
            
            echo "
            <script>
            window.alert('비밀번호가 틀립니다!')
            location.href='./175-signInForm.php';
            </script>
            ";
            exit;
            
        } else {
            session_start();
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['nickname'] = $row['nickname'];

            echo $_SESSION['userID'];
            echo $_SESSION['nickname'];
            exit;
            
            // TODO: 로그인 성공시 게시판으로 이동 필요
            echo "
            <script>
            window.alert('로그인에 성공하였습니다!')
            location.href = '../170-index.php'; 
            </script>
            "; 
        }
    }

    // // mysqli_multi_query : 단 한개의 쿼리만 실행하도록 하는 함수
    // if ($result === false) {
    //     echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
    //     echo "<br>".mysqli_error($conn);
        
    // } else {
    //     echo "성공했습니다. <a href='../170-index.php'>게시판으로 이동하기</a>";
    // }



        /* 
            / 절대경로  
            ../ 상위경로 접근
            ./ 현재경로
        */ 