<?php
include "../Connection/Connection.php";
if (isset($_POST['input'])) {
    if ($_POST['input'] !== "") {
        $input = $_POST['input'];
        $query = "SELECT post.*, user.username, user.nickname, user.profilepic
            FROM post 
            JOIN user ON post.user_id = user.id
            WHERE user.username LIKE '%$input%'";
        $sql = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($sql)) {
            echo "<div class='posting_card'>
            <div class='user-header'>
              <div class='user-left'>
                <img src='pfp/" . $row['profilepic'] . "' alt='Foto Profil'>
                <div class='user-info'>
                  <p class='display-nameBlack'>" . $row['nickname'] . "</p>
                  <p class='username'>" . $row['username'] . "</p>
                </div>
              </div>
              <label class='follow-toggle'>
                <input type='checkbox' hidden />
                <span class='follow-btn'>Follow</span>
              </label>
            </div>
            <img src='../Posting/" . $row['gambar'] . "' class='post-image'>
            <span>" . $row['caption'] . "</span><br>
            <div class='button_action'>
              <label class='icon-toggle'>
                <input type='checkbox' class='temporary' name='likes' hidden data-id='" . $row["post_id"] . "'>
                <span class='fa-regular fa-heart'></span>
                <span>" . $row["likes"] . "</span> 
              </label>
              <label class='icon-toggle'>
                <input type='checkbox' hidden>
                <a href='comment.php?id=" . $row['post_id'] . "'><span class='fa-regular fa-comment'></span></a>
                <span>" . $row["comment"] . "</span>
              </label>
              <label class='icon-toggle'>
                <input type='checkbox' class='bookmark' hidden data-id='" . $row["post_id"] . "'>
                <span class='fa-regular fa-bookmark'></span>
                <span>" . $row["bookmarked"] . "</span>
              </label>
              <label class='icon-toggle'>
                <input type='checkbox' hidden>
                <span class='fa-solid fa-retweet'></span>
              </label>
            </div>
          </div>";

        }
    } else {
        $query = "SELECT * FROM user ORDER BY RAND() LIMIT 5";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) {
            $followButton = "follow" . $row['id'];
            $profilePic = $row['profilepic'] ?: 'default.jpg';
            echo "<div class='user-suggestion'>
              <img src='pfp/" . htmlspecialchars($profilePic) . "' alt='Profile' class='profile-img'>
              <div class='user-info'>
                <p class='display-name'>" . htmlspecialchars($row['nickname']) . "</p>
                <p class='username'>@" . htmlspecialchars($row['username']) . "</p>
              </div>
              <input type='checkbox' id='" . $followButton . "' class='follow-toggle hidden'>
              <label for='" . $followButton . "' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>
            </div>";
        }
    }
}
?>

<!--likes-->
<script>
    $(document).ready(function () {
        $(".temporary").change(function () {
            let postId = $(this).data("id");
            let $countSpan = $(this).siblings("span").last();

            $.post("likes.php", { id: postId }, function (response) {
                $countSpan.text(response);
            });
        });
    });
</script>
<!--bookmark-->

<script>
    $(document).ready(function () {
        $(".bookmark").change(function () {
            let postId = $(this).data("id");
            let caption = $(this).data("caption");
            let image = $(this).data("gambar");
            let likes = $(this).data("likes");
            let $countSpan = $(this).siblings("span").last();
            $.post("bookmarking.php", { postid: postId, caption: caption, image: image, likes: likes }, function (response) {
                $countSpan.text(response);
            });
        });
    });
</script>