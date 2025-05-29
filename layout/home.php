<?php
session_start();
include('../Connection/Connection.php');

if (isset($_GET['buttonRegis'])) {

  $username = $_GET['username'];
  $nickname = $_GET['nickname'];
  $email = $_GET['email'];
  $password = $_GET['password'];
  $hashpassword = md5($_GET['password']);
  $birth = $_GET['birth'];
  $phone = $_GET['phone'];
  $location = $_GET['location'];
  $bio = $_GET['bio'];
  $gender = $_GET['gender'];
  $pfp = "avatar def.jpg";
  $banner = "white.jpg";

  $query = "INSERT INTO user (username, nickname, email, password, hashpassword, date_of_birth, location, phone, gender, bio, role, profilepic, bgcol, bannerpic) VALUES (
    '$username',
    '$nickname',
    '$email',
    '$password', 
    '$hashpassword',
    '$birth',
    '$location',
    '$phone',
    '$gender',
    '$bio',
    'member',
    '$pfp',
    '#fff',
    '$banner'
);";
  $result = mysqli_query($connection, $query);

  $query2 = "SELECT id FROM user WHERE username = '$username' LIMIT 1";
  $result2 = mysqli_query($connection, $query2);
  if ($row = mysqli_fetch_array($result2)) {
    $_SESSION['user_id'] = $row['id'];
  }
}


$id = $_SESSION['user_id'];



if (isset($_POST['upload'])) {
  $caption = $_POST['caption'];
  $posting = $_FILES['postPhoto']['name'];
  $temporary = $_FILES['postPhoto']['tmp_name'];
  $id = $_POST['id'];

  move_uploaded_file($temporary, "../Posting/pict/" . $posting);

  $filepath = "pict/" . $posting;
  $insert = "INSERT INTO post (user_id, caption, gambar) VALUES 
                    ('$id', '$caption', '$filepath')";

  if (mysqli_query($connection, $insert)) {
    
  } 
}



if (isset($_GET['input'])) {
  include('../Connection/Connection.php');
  $username = $_GET['username'];

  $query = "SELECT id FROM user WHERE username = '$username' LIMIT 1";
  $result = mysqli_query($connection, $query);
  $id;

  if ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
  }
}
?>
<!--bgcheck-->
<?php
include('../Connection/Connection.php');

$query = mysqli_query($connection, "SELECT bgcol FROM user WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
$bgcol = $row['bgcol'];

$backgroundColor = "#ffffff"; 
if ($bgcol == 1) {
  $backgroundColor = "#2b5876"; 
} else {
  $backgroundColor = "#ffffff";
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SeaGram</title>
  <link rel="stylesheet" href="../CSS/sidebar.css" />
  <link rel="stylesheet" href="../CSS/rightbar.css" />
  <link rel="stylesheet" href="../CSS/reccomended.css" />
  <link rel="stylesheet" href="../CSS/midPost.css" />
  <link rel="stylesheet" href="../CSS/Posting.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!--googlejquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../JS/ajaxlivesearch.js"></script>
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
    <div class="sidebarOption active">
      <a style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span class="material-icons"> home </span>
        <h2>Home</h2>
      </a>
    </div>

    <div class="sidebarOption">
      <?php
      if (isset($id)) {
        $temp = "?id=" . $id;
      }
      ?>
      <a href="../layout/search.php"
        style="display: flex; align-items: center; text-decoration: none; color: inherit;">
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
      <a href="../layout/profile.php"
        style="display: flex; align-items: center; text-decoration: none; color: inherit;">
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

    <!-- Welcome to -->
    <div class="welcomeUser">
      <span class="welcome-text">WELCOME
        <?php
        if (isset($username)) {
          $query = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
          $result = mysqli_query($connection, $query);
          if ($row = mysqli_fetch_array($result)) {
            echo $row['nickname'];
          }
        }
        if (isset($id)) {
          $query = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
          $result = mysqli_query($connection, $query);
          if ($row = mysqli_fetch_array($result)) {
            echo $row['nickname'];
          }
        }
        ?>
      </span>
    </div>

    <!-- Udah masuk ke posting -->
    <?php
      include('../Connection/Connection.php');
      $query = "SELECT * FROM post";
      $result = mysqli_query($connection, $query);
  
      while ($row = mysqli_fetch_assoc($result)) { // Geting post_id
  
        $id = $row['user_id'];
        $query2 = "SELECT * FROM user WHERE id = '$id'";
        $result2 = mysqli_query($connection, $query2);
  
        while ($row2 = mysqli_fetch_array($result2)) { // Getting user_id

          echo "<div class='posting_card'>";
          echo "  <div class='user-header'>";
          echo "    <div class='user-left'>";
          echo "      <img src = 'pfp/" . $row2['profilepic'] . "' alt='Foto Profil'>";
          echo "        <div class='user-info'>";
          echo "          <p class='display-name'>" . $row2['nickname'] . "</p>";
          echo "          <p class='username'>" . $row2['username'] . "</p>";
          echo "        </div>";
          echo "    </div>";
  
          echo "    <label class='follow-toggle'>";
          echo "      <input type='checkbox' hidden />";
          echo "      <span class='follow-btn'>Follow</span>";
          echo "    </label>";
          echo "   </div>";
          echo "  <img src = '../Posting/" . $row['gambar'] . "' class='post-image'>";
  
          echo '<span>'. $row['caption'] .'</span><br>
                <div class="button_action">
                  
                  <label class="icon-toggle">
                    <input type="checkbox" class="temporary" name="likes" hidden data-id="'. $row["post_id"] . '">
                    <span class="fa-regular fa-heart"></span>
                    <span>' . $row["likes"] . '</span> 
                  </label>
  

                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-regular fa-comment"></span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" class="bookmark" hidden data-id="' .$row["post_id"].'">
                    <span class="fa-regular fa-bookmark"></span>
                    <span>'.$row["bookmarked"].'</span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-solid fa-retweet"></span>
                  </label>
                </div>
              </div>';
        }
      }
    ?>
    <!--likes-->
    <script>
    $(document).ready(function(){
      $(".temporary").change(function(){
        let postId = $(this).data("id");
        let $countSpan = $(this).siblings("span").last();

        $.post("likes.php", { id: postId }, function(response){
            $countSpan.text(response); 
        });
      });
    });
    </script>
    <!--bookmark-->
    <script>
    $(document).ready(function(){
      $(".bookmark").change(function(){
        let postId = $(this).data("id");
        let caption = $(this).data("caption");
        let image = $(this).data("gambar");
        let likes = $(this).data("likes");
        let $countSpan = $(this).siblings("span").last();
         $.post("bookmarking.php", {postid:postId, caption:caption, image:image, likes:likes},function(response){
            $countSpan.text(response); 
        });
      });
    });
    </script>
    <!-- <div class="button_action">
      <label class="icon-toggle">
        <input type="checkbox" hidden>
        <span class="fa-regular fa-heart"></span>
      </label>
      <label class="icon-toggle">
        <input type="checkbox" hidden>
        <span class="fa-regular fa-comment"></span>
      </label>
      <label class="icon-toggle">
        <input type="checkbox" hidden>
        <span class="fa-regular fa-bookmark"></span>
      </label>
      <label class="icon-toggle">
        <input type="checkbox" hidden>
        <span class="fa-solid fa-retweet"></span>
      </label>
    </div> -->
  </div>
  </div>


  <div class="rightbar">
    <!--search&follow-->
    <div id="user-data" data-user-id="<?= htmlspecialchars($id) ?>"></div>
    <form class="searchcontainer" action="#">
      <div class="search">
        <span class="material-icons"> search </span>
        <input class="search-input" id="searchin" type="search" name="search" placeholder="search">
      </div>
    </form>

    <div id="searchHint">

    </div>

    <!-- recommended people -->
    <div class="reccomended">

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

    </div>
    <!-- end recommended people -->

    <div>

    </div>
      <hr>
      <span>seagram 2025</span>
  </div>
</body>


</html>