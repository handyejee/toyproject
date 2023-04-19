<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");
// echo "<pre>";
// print_r($conn);
// echo "</pre>";

$sql = " 
    INSERT INTO topic
        (title, 
        description, 
        created
        ) VALUES (
        'MySQL',
        'MySQL is..',
        NOW()
    )";

mysqli_query($conn, $sql);


if($result === false){
    echo mysqli_error($conn); // error가 난 경우 db에서 처럼 에러메세지를 보여준다.
} else {
    echo "query 등록 확인";
}
    
?>