<?php
session_start();
$id = $_SESSION['user_id'];

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
  <link rel="stylesheet" href="../CSS/comment.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!--googlejquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../JS/ajaxlivesearch.js"></script>
  <style>
    :root {
      --background:
        <?php echo $backgroundColor; ?>
      ;
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

  <div class="posts">
    <?php
    $post_id = $_GET['id'];
    $query = "SELECT * FROM post WHERE post_id = '$post_id'";
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

        echo '<span>' . $row['caption'] . '</span><br>
                <div class="button_action">
                  
                  <label class="icon-toggle">
                    <input type="checkbox" class="temporary" name="likes" hidden data-id="' . $row["post_id"] . '">
                    <span class="fa-regular fa-heart"></span>
                    <span>' . $row["likes"] . '</span> 
                  </label>
  

                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <a href="comment.php?id=' . $row['post_id'] . '"><span class="fa-regular fa-comment"></span></a>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" class="bookmark" hidden data-id="' . $row["post_id"] . '">
                    <span class="fa-regular fa-bookmark"></span>
                    <span>' . $row["bookmarked"] . '</span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-solid fa-retweet"></span>
                  </label>
                </div>
              </div>';

        echo "<div class='comment-section'>";

        $query3 = "SELECT * FROM comment WHERE post_id = $post_id";
        $result3 = mysqli_query($connection, $query3);
        while ($row3 = mysqli_fetch_array($result3)) {
          echo "";
            echo "  <div class='user-header2'>";
            echo "    <div class='user-left2'>";
            echo "      <img src = 'pfp/" . $row2['profilepic'] . "' alt='Foto Profil'>";
            echo "        <div class='user-info2'>";
            echo "          <p class='display-name2'>" . $row2['nickname'] . "</p>";
            echo "          <p class='username2'>" . $row2['username'] . "</p>";
            echo "        </div>";
            echo "    </div>";
            echo "    <span class='comment'>" . $row3['caption'] . "</span>";
            echo "   </div>";
        }
      }
    }

    ?>
  </div>

  <form method="post" style="margin-top: 20px;">
    <input type="text" name="comment" placeholder="Tulis komentar..."
      style="padding: 8px; width: 70%; border-radius: 8px; border: 1px solid #ccc;">
    <input type="submit" name="inputt" value="Kirim"
      style="padding: 8px 16px; border-radius: 8px; background-color: #0084ff; color: white; border: none;">
  </form>

  <?php
  if (isset($_POST['inputt'])) {
    $comment = $_POST['comment'];

    $input = "INSERT INTO comment (user_id, post_id, caption) VALUE (
        '$id',
        '$post_id',
        '$comment'
        );";

    $queryInput = mysqli_query($connection, $input);

  }
  ?>


  </div>

</body>


</html>