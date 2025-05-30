      <?php
     session_start();
     $id = $_SESSION['user_id'];
     $temp = $_SESSION['user_id'];
      ?>
      <!DOCTYPE html>
      <html lang="en">
      <!--bgcheck-->
      <?php
      include('../Connection/Connection.php');

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
        <link rel="stylesheet" href="../CSS/Posting.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <a href="../layout/home.php" class="svghover">
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
            <a href="../layout/home.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
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
            <a href="../layout/bookmark.php"
              style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> bookmark </span>
              <h2>Bookmarks</h2>
            </a>
          </div>

          <div class="sidebarOption">
            <a href="../layout/profile.php" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> perm_identity </span>
              <h2>Profile</h2>
            </a>
          </div>

          <div class="sidebarOption">
            <a href="../layout/settings.php"
              style="display: flex; align-items: center; text-decoration: none; color: inherit;">
              <span class="material-icons"> settings </span>
              <h2>Settings</h2>
            </a>
          </div>
        </div>

        <!-- posting -->

        <div class="posts">

          <form class="searchcontainer" action="">
            <a href="../Posting/PostingForm.php" class="createpost search">Create Post</a>
            <div class="search">
              <span class="material-icons"> search </span>
              <input class="search-input long" id="searchin" type="search" placeholder="search">
            </div>
          </form>
          <div id="searchHint">
            <?php
            $query = "SELECT * FROM user ORDER BY RAND() LIMIT 5";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
              $followButton = "follow" . $row['id'];
              echo "<div class='user-suggestion'>";
              echo "   <img src = 'pfp/" . $row['profilepic'] . "' alt='Profile 1' class = 'profile-img'>";
              echo "    <div class='user-info'>";
              echo "        <div class='user-info'>";
              echo "          <p class='display-name'>" . $row['nickname'] . "</p>";
              echo "          <p class='username'>" . $row['username'] . "</p>";
              echo "        </div>";
              echo "    </div>";
              echo "    <input type='checkbox' id='" . $followButton . "' class='follow-toggle hidden'>";
              echo "    <label for='" . $followButton . "' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>";
              echo "</div>";
            }
            ?>
          </div>
        </div>

        <div class="rightbar">
          <hr class="headersearch">
          <div class="footersearch"> 
            
            <span class="footspan"> &copy; seagram 2025</span>
          </div>
        </div>

      </body>

      </html>