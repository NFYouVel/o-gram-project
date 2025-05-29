<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id = $_SESSION['user_id'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../CSS/profile.css" />
     <link rel="stylesheet" href="../CSS/sidebar.css" />
        <link rel="stylesheet" href="../CSS/rightbar.css" />
        <link rel="stylesheet" href="../CSS/search.css" />
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
          <link rel="stylesheet" href="../CSS/midPost.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
      <a href="../layout/home.php" class="svghover">
       <svg class="icon" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 264.564 264.564" xml:space="preserve" stroke="#50b7f5"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M132.281,264.564c51.24,0,92.931-41.681,92.931-92.918c0-50.18-87.094-164.069-90.803-168.891L132.281,0l-2.128,2.773 c-3.704,4.813-90.802,118.71-90.802,168.882C39.352,222.883,81.042,264.564,132.281,264.564z"></path> </g> </g> </g></svg>
      </a>
       <div class="sidebarOption">
        <a href="../layout/home.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> home </span>
        <h2>Home</h2>
        </a>
      </div>

      <div class="sidebarOption">
        <a href="../layout/search.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> search </span>
        <h2>Explore</h2>
        </a>
      </div>

      <div class="sidebarOption ">
        <a href="../layout/bookmark.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> bookmark </span>
        <h2>Bookmarks</h2>
        </a>
      </div>

      <div class="sidebarOption ">
        <a href="../layout/profile.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> perm_identity </span>
        <h2>Profile</h2>
        </a>
      </div>

      <div class="sidebarOption">
        <a href="../layout/settings.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> settings </span>
        <h2>Settings</h2>
        </a>
      </div>
    </div>

    <?php
    include("../Connection/Connection.php");
    if (isset($_GET['tempid'])) {
    $id = $_GET['tempid'];
    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='profile-bg'>";
            echo "<div class='user-header'>";
                echo "<div class='user-left'>";
                    echo "<img src= 'pfp/" . $row['profilepic'] ."' alt='Foto Profile'>";
                echo "</div>";
                    echo "<div class='user-info'>";
                        echo "<p class = 'display-name'>" . $row['nickname'] . "</p>";
                        echo "<p class = 'username'>@" . $row['username'] . "</p>";
                        echo "<br>" . "<p class = 'joined-date'>" . $row['created_at'] . "</p>";
                        echo "</div>";
            echo "</div>";
    
                echo "<label class = 'edit-toggle'>";
                    echo "<a href = '#'>Edit Profile</a>";
                echo"</label>";
            echo "</div>";
        echo "</div>";
    }
    
    }
    ?>
</body>

</html>