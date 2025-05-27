<?php
include('../Connection/Connection.php');
 $choice = $_GET["colorChoice"];
 $id = $_GET['id'];

        mysqli_query($connection, "UPDATE user SET bgcol = $choice WHERE id = '$id'");

        $color = mysqli_query($connection, "SELECT bgcol FROM user WHERE id = '$id'");
        $color = mysqli_fetch_array($color);
        $color = $color["bgcol"];

        if($color == 1) {
            echo "white";
        }
        else{
            echo "black";  
        }

?>