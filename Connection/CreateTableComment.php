<?php
    include('Connection.php');

    $query = "CREATE TABLE comment (
        comment_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        post_id INT NOT NULL,
        caption VARCHAR(255) NOT NULL
    );";
    
    $result = mysqli_query($connection,$query);
?>