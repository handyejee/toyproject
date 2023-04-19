<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");
$sql = " 
    INSERT INTO topic
        (title, 
        description, 
        created
        ) 
        VALUES (
        'MySQL',
        'MySQL is..',
        NOW()
    )";

mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn); // error 가 어떤 error 인지 database에서 알려줌
}
    
?>