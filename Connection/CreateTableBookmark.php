<?php
    include("Connection.php");

    $query = "CREATE TABLE bookmark (
        bookmark_id INT PRIMARY KEY AUTO_INCREMENT,
        post_id INT NOT NULL,
        user_id INT NOT NULL,
        caption VARCHAR(50) NOT NULL,
        gambar VARCHAR(100),
        likes INT DEFAULT 0
    );";

    $result = mysqli_query($connection,$query);
?>