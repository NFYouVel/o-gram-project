<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_ogram";

    $connection = mysqli_connect($servername,$username,$password,$database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error() . "!");
    } else {
        echo "Connection Successful!";
    }
?>