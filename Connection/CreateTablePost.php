<?php
include('Connection.php');

$query = "CREATE TABLE post (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    caption VARCHAR(50) NOT NULL,
    gambar VARCHAR(100),
    likes INT DEFAULT 0
    -- bookmark INT AUTO_INCREMENT 
);";

$result = mysqli_query($connection,$query);
?>
