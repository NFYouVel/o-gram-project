<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../CSS/login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="wrapper">
        <form method="post" id="loginForm">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="username" required id="username">
                <label for="username">Username</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <label for="password">Password</label>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="forget-remember">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button class="btn" name="input" value="Submit">Login</button>

            <div class="register-link">
                <p>Don't Have Account? <a href="../Register/register.php">Register</a></p>
            </div>
        </form>
        <div id="response" style="color:red; text-align:center; margin-top:10px;"></div>
    </div>


    
<?php
session_start();
include('../../Connection/Connection.php');
    


if (isset($_POST['input'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_array($result)) {
        if ($row['password'] === $password) {
            header('Location: ../../layout/home.php');
            exit();
        } else {
            echo "<script>document.getElementById('response').innerText = 'Password Salah';</script>";
        }
    } else {
        echo "<script>document.getElementById('response').innerText = 'Username tidak ditemukan';</script>";
    }
}

?>
</body>

</html>