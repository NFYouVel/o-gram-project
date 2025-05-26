<?php
    include "../Connection/Connection.php";
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $query = "SELECT * FROM users WHERE $input LIKE username";
        $sql = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_array($sql)) {
        $name = $row["username"];
            echo "<div class='user-suggestion'>
        <img src='../layout/pict/Screenshot (10).png' alt='Profile 1' class='profile-img'>
        <div class='user-info'>
          <p class='display-name'>".$name."</p>
          <p class='username'>@DavidChristian</p>
        </div>
        <input type='checkbox' id='follow1' class='follow-toggle hidden'>
        <label for='follow1' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>
      </div>";
        }
    }
?>