<?php
    include('Connection.php');

    $query = "CREATE TABLE comment (
        comment VARCHAR(300) PRIMARY KEY NOT NULL
    );";

    $result = mysqli_query($connection,$query);
?>