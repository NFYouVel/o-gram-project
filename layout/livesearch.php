<?php
include "../Connection/Connection.php";
if (isset($_POST['input'])) {
  $input = $_POST['input'];
  $query = "SELECT * FROM user WHERE username LIKE '%$input%'";
  $sql = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($sql)) {
    $name = $row["username"];
    $nickname = $row["nickname"];
    $id = $row["id"];
    if (isset($row['profilepic'])) {
      echo "<a href='../layout/searchprofile.php?id='$id'>
      <div class='user-suggestion'>
        <img src='pfp/" . $row['profilepic'] . "' alt='Profile 1' class='profile-img'>
        <div class='user-info'>
          <p class='display-name'>" . htmlspecialchars($name) . "</p>
          <p class='username'>@" . htmlspecialchars($nickname) . "</p>
        </div>
        <input type='checkbox' id='follow1' class='follow-toggle hidden'>
        <label for='follow1' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>
      </div>";
    }
    else{
      echo "<div class='user-suggestion'>
        <img src='pfp/avatar def.jpg' alt='Profile 1' class='profile-img'>
        <div class='user-info'>
          <p class='display-name'>" . htmlspecialchars($name) . "</p>
          <p class='username'>@" . htmlspecialchars($nickname) . "</p>
        </div>
        <input type='checkbox' id='follow1' class='follow-toggle hidden'>
        <label for='follow1' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>
      </div>";
    }
  }
}
?>