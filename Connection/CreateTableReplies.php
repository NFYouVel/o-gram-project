<?php
    include("Connection.php");

    $query="CREATE TABLE replies(
        reply VARCHAR(200) NOT NULL;
    );";

    $result=mysqli_query($connection,$query);
?>