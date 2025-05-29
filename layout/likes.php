
<?php
include('../Connection/Connection.php');
session_start();

$userId = $_SESSION['user_id']; 
$postId = intval($_POST['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $userId && $postId) {
    $check = mysqli_query($connection, "SELECT * FROM likes WHERE user_id = $userId AND post_id = $postId");

    if (mysqli_num_rows($check) > 0) {
        // Udah like
        mysqli_query($connection, "DELETE FROM likes WHERE user_id = $userId AND post_id = $postId");
        mysqli_query($connection, "UPDATE post SET likes = likes - 1 WHERE post_id = $postId");
    } else {
        // Belum like
        mysqli_query($connection, "INSERT INTO likes (user_id, post_id) VALUES ($userId, $postId)");
        mysqli_query($connection, "UPDATE post SET likes = likes + 1 WHERE post_id = $postId");
    }
    
    $res = mysqli_query($connection, "SELECT likes FROM post WHERE post_id = $postId");
    $row = mysqli_fetch_assoc($res);
    echo $row['likes'];
}
?>
