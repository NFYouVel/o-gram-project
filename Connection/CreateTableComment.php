<?php
    include('Connection.php');

    $query = "CREATE TABLE likes (
        comment_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        post_id INT NOT NULL
    );";
    
    $result = mysqli_query($connection,$query);
?>