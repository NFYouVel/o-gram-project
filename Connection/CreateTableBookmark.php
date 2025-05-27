<?php
    include("Connection.php");

    $query = "CREATE TABLE bookmark (
        post_id INT NOT NULL PRIMARY KEY
    );";

    $result = mysqli_query($connection,$query);
?>