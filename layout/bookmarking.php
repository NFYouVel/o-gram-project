<?php
    include "../Connection/Connection.php";
    session_start();
    $user_id = $_SESSION["user_id"];
    $post_id = intval($_POST['postid']);

    $check = mysqli_query($connection, "SELECT 1 FROM bookmark WHERE user_id = $user_id AND post_id = $post_id");
    if (mysqli_num_rows($check) > 0) {
    // Hapus bookmark
    mysqli_query($connection, "DELETE FROM bookmark WHERE user_id = $user_id AND post_id = $post_id");
    mysqli_query($connection, "UPDATE post SET bookmarked = bookmarked - 1 WHERE post_id = $post_id");
    } else {
    // Tambahkan bookmark
    mysqli_query($connection, "INSERT INTO bookmark (post_id, user_id) VALUES ($post_id, $user_id)");
    mysqli_query($connection, "UPDATE post SET bookmarked = bookmarked + 1 WHERE post_id = $post_id");
    }
    $takeBookmark = mysqli_query($connection,"SELECT bookmarked FROM post WHERE post_id = $post_id");
    $row = mysqli_fetch_array($takeBookmark);
    echo $row["bookmarked"];


?>