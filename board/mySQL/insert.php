<?php
$conn = mysqli_connect("localhost", "root", "root", "livDB");
mysqli_query($conn, "
    INSERT INTO topic
        (title, description, created)
        VALUES(
            'MySQL',
            'MySQL is..',
            NOW()
        )
");

?>