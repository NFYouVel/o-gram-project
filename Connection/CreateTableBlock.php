<?php
    include("Connection.php");

    $query = "CREATE TABLE blocked_acc (
        block_id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        reason VARCHAR(255)
    );";

    $result = mysqli_query($connection,$query);
?>