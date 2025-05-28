<?php
if (isset($_POST['upload'])) {
    include('../../Connection/Connection.php');

    $confirm = $_POST['confirm'];
    $id = $_GET['id'];

    $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_array($result)) {
        $changeQuery = "UPDATE user SET password = '$confirm' WHERE id = '$id' ";
        $result = mysqli_query($connection, $changeQuery);
    }

    $location = "Location: login.php";
    header($location);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #121212;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #eee;
        }

        form {
            background: #1e1e1e;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
            width: 350px;
        }

        /* Label styling */
        form label,
        form span {
            font-weight: 600;
            font-size: 1rem;
            display: block;
            margin-bottom: 8px;
            color: #00aaff;
        }

        /* Input text & file */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #00aaff;
            border-radius: 8px;
            background: #121212;
            color: #eee;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #33ccff;
            outline: none;
        }

        /* Submit button */
        input[type="submit"] {
            background: #00aaff;
            border: none;
            color: #121212;
            font-weight: 700;
            padding: 12px 0;
            border-radius: 8px;
            width: 100%;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 170, 255, 0.5);
        }

        input[type="submit"]:hover {
            background: #33ccff;
            box-shadow: 0 6px 20px rgba(51, 204, 255, 0.7);
        }
    </style>
</head>

<body>

    <form method="post" action="?id=<?php echo $_GET['id']; ?>">

        Password
        <input type="text" name="password" required placeholder="Input Your Password...">
        Confirm Password
        <input type="text" name="confirm" required placeholder="Confirm Your Password...">
        <input type="submit" name="upload" onclick="Click()">
        <div id="response" style="color:pink; text-align:center; margin-top:10px;"></div>
    </form>

    <script>
        function Click() {
            alert("Change Password Berhasil")
        }
    </script>
</body>


</html>