<?php
    include("Connection.php");

    $query = "CREATE TABLE bookmark (
        bookmark_id INT PRIMARY KEY AUTO_INCREMENT,
        post_id INT NOT NULL,
        user_id INT NOT NULL
    );";

    $result = mysqli_query($connection,$query);
?>