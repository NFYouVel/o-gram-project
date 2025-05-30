<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <style>
        body {
            background-color: white;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="post">
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Nickname</th>
                <th>Email</th>
                <th>Password</th>
                <th>Hashpassword</th>
                <th>Date of birth</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Bio</th>
                <th>Role</th>
                <th>Created at</th>
                <th>Bg Color</th>
                <th>Profile Pic</th>
                <th>Banner Pic</th>
                <th>Block</th>
                <th>Check</th>
                <th>Reason</th>
            </tr>
            <?php
            include("../../Connection/Connection.php");
            $select = "SELECT * FROM user";
            $result = mysqli_query($connection, $select);

            while ($line = mysqli_fetch_array($result)) {
                echo "<tr>";

                echo "<td>";
                echo $line['username'];
                echo "</td>";
                echo "<td>";
                echo $line['nickname'];
                echo "</td>";
                echo "<td>";
                echo $line['email'];
                echo "</td>";
                echo "<td>";
                echo $line['password'];
                echo "</td>";
                echo "<td>";
                echo $line['hashpassword'];
                echo "</td>";
                echo "<td>";
                echo $line['date_of_birth'];
                echo "</td>";
                echo "<td>";
                echo $line['location'];
                echo "</td>";
                echo "<td>";
                echo $line['phone'];
                echo "</td>";
                echo "<td>";
                echo $line['gender'];
                echo "</td>";
                echo "<td>";
                echo $line['bio'];
                echo "</td>";
                echo "<td>";
                echo $line['role'];
                echo "</td>";
                echo "<td>";
                echo $line['created_at'];
                echo "</td>";
                echo "<td>";
                echo $line['bgcol'];
                echo "</td>";

                echo "<td><img src='../../layout/pfp/" . $line['profilepic'] . "' width='50'></td>";
                echo "<td><img src='../../layout/banner/" . $line['bannerpic'] . "' width='50'></td>";

                echo "<td>";
                echo $line['status'];
                echo "</td>";

                echo "<td><input type='checkbox' name='blockid[]' value='" . $line['id'] . "'></td>";
                echo "<td><input type='text' name='reason[]'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <button type='submit' name='block'>Block id yang dipilih</button>
    </form>

    <?php
    if (isset($_POST['block']) && !empty($_POST['blockid'])) {
        $blockIds = $_POST['blockid'];
        $reasonIds = $_POST['reason'];

        foreach ($blockIds as $id) {
            $sql = "UPDATE user SET status = 'block' WHERE id = $id";
            mysqli_query($connection, $sql);
        }

        for ($i = 0; $i < count($blockIds); $i++) {
            $indexBlock = $blockIds[$i];
            $indexReason = $reasonIds[$i];

            $indexBlock = mysqli_real_escape_string($connection, $indexBlock);
            $sql = "DELETE FROM blocked_acc WHERE user_id = '$indexBlock'";
            $result = mysqli_query($connection, $sql);

            $sql2 = "INSERT INTO blocked_acc(user_id,reason) VALUES('$indexBlock','$indexReason')";
            mysqli_query($connection, $sql2);
        }

        echo "Berhasil block data.";
        header("Location: adminInterface.php");
        exit;
    } else if (isset($_POST['delete'])) {
        echo "Ga ada data yang dipilih.";
    }
    ?>


</body>

</html>