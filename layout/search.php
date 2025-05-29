      <?php
      $temp = $_GET['id'];
      ?>
      <!DOCTYPE html>
      <html lang="en">
<!--bgcheck-->
<?php
include('../Connection/Connection.php');
$id = $_GET['id'];

$query = mysqli_query($connection, "SELECT bgcol FROM user WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
$bgcol = $row['bgcol'];

$backgroundColor = "#ffffff"; 
if ($bgcol == 1) {
  $backgroundColor = "#2b5876"; 
} else if ($bgcol == 2) {
  $backgroundColor = "#ffffff";
} 
?>
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SeaGram</title>
        <link rel="stylesheet" href="../CSS/sidebar.css" />
        <link rel="stylesheet" href="../CSS/rightbar.css" />
        <link rel="stylesheet" href="../CSS/search.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="../CSS/midPost.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <!--googlejquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../JS/ajaxlivesearchpage.js"></script>
        <style>
  :root {
    --background: <?php echo $backgroundColor; ?>;
  }
</style>
      </head>

      <body>
        <div class="sidebar">
          <a href="../layout/home.php?id=<?php echo $temp ?>" class="svghover">
            <svg class="icon" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 264.564 264.564" xml:space="preserve" stroke="#50b7f5">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <g>
                    <path
                      d="M132.281,264.564c51.24,0,92.931-41.681,92.931-92.918c0-50.18-87.094-164.069-90.803-168.891L132.281,0l-2.128,2.773 c-3.704,4.813-90.802,118.71-90.802,168.882C39.352,222.883,81.042,264.564,132.281,264.564z">
                    </path>
                  </g>
                </g>
              </g>
            </svg>
          </a>
          <div class="sidebarOption">
            <a href="../layout/home.php?id=<?php echo $temp ?>" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> home </span>
              <h2>Home</h2>
            </a>
          </div>

          <div class="sidebarOption active">
            <a style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> search </span>
              <h2>Explore</h2>
            </a>
          </div>

          <div class="sidebarOption">
            <a href="../layout/bookmark.php?id=<?php echo $temp?>"
              style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> bookmark </span>
              <h2>Bookmarks</h2>
            </a>
          </div>

          <div class="sidebarOption">
            <a href="../layout/profile.php?id=<?php echo $temp?>" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> perm_identity </span>
              <h2>Profile</h2>
            </a>
          </div>

          <div class="sidebarOption">
            <a href="../layout/settings.php?id=<?php echo $temp?>"
              style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> settings </span>
              <h2>Settings</h2>
            </a>
          </div>
        </div>

        <!-- posting -->

        <div class="posts">

          <form class="searchcontainer" action="">
            <a href="../Posting/PostingForm.php?id=<?php echo $temp ?>" class="createpost search">Create Post</a>
            <div class="search">
              <span class="material-icons"> search </span>
              <input class="search-input long" id="searchin" type="search" placeholder="search">
            </div>
          </form>
          <div id="searchHint">

          <div class="recommend-people">
            <h2 id="where-follow">Who to follow</h2>
            <div class="user-suggestion">
              <img src="../layout/pict/Screenshot (10).png" alt="Profile 1" class="profile-img">
              <div class="user-info">
                <p class="display-name">David</p>
                <p class="username">@DavidChristian</p>
              </div>
              <input type="checkbox" id="follow1" class="follow-toggle hidden">
              <label for="follow1" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
            </div>

            <div class="user-suggestion">
              <img src="../layout/pict/Screenshot (11).png" alt="Profile 2" class="profile-img">
              <div class="user-info">
                <p class="display-name">James</p>
                <p class="username">@KohJiaQuan</p>
              </div>
              <input type="checkbox" id="follow2" class="follow-toggle hidden">
              <label for="follow2" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
            </div>

            <div class="user-suggestion">
              <img src="../layout/pict/Screenshot (14).png" alt="Profile 3" class="profile-img">
              <div class="user-info">
                <p class="display-name">Marvel</p>
                <p class="username">@MarvelMoshing</p>
              </div>
              <input type="checkbox" id="follow3" class="follow-toggle hidden">
              <label for="follow3" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
            </div>

            <div class="user-suggestion">
              <img src="../layout/pict/Screenshot (14).png" alt="Profile 4" class="profile-img">
              <div class="user-info">
                <p class="display-name">Leon</p>
                <p class="username">@LeonardPig</p>
              </div>
              <input type="checkbox" id="follow4" class="follow-toggle hidden">
              <label for="follow4" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
            </div>

            <div class="user-suggestion">
              <img src="../layout/pict/Screenshot (14).png" alt="Profile 5" class="profile-img">
              <div class="user-info">
                <p class="display-name">McQueen</p>
                <p class="username">@LightningMcQueen</p>
              </div>
              <input type="checkbox" id="follow5" class="follow-toggle hidden">
              <label for="follow5" class="follow-btn" data-text="Follow" data-text-checked="Unfollow"></label>
            </div>
          </div>
          </div>
        </div>

        <div class="rightbar">
          <!--search&follow-->
          <!-- <form class= "searchcontainer" action="#">
            <div class="search">
                <span class="material-icons"> search </span>
                <input class="search-input" type="search" placeholder="search">
            </div>
      </form> -->

          <div class="reccomended">
            <span class="text">this is for reccomended</span>
          </div>
          <div class="footer">
            <hr>
            <span>seagram 2025</span>
          </div>
        </div>

      </body>

      </html>