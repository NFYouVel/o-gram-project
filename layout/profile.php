<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../CSS/profile.css" />
</head>

    <?php
    include("../Connection/Connection.php");
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user";
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
    <style>
        .profile-bg{
            background-color: black;
            /* margin-bottom: 10%; */
        }

        .user-header{
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
            padding: 15px 0;
        }

        .user-left{
            display: flex;
            align-items: center;
        }

        .user-header img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-info{
            flex-direction: column;
        }

        .display-name{
            color : white;
            font-weight: bold;
            margin: 0;
            font-size: 1.4em;
        }

        .username{
            color: gray;
            font-size: 0.8em;
            margin: 0;
        }

        .joined-date{
            color : white;
        }

    </style>
</body>

</html>