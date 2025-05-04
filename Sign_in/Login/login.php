<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="username" required>
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

            <button class="btn" value="Submit">Login</button>

            <div class="register-link">
                <p>Don't Have Account? <a href="#">Register</a></p>
                halo
            </div>
        </form>
    </div>
</body>

</html>