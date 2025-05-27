<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            --bg-color : black;
        }
        .test{
            background-color: ;
        }
    </style>
</head>
<body>
    <button onclick = "changeBG(1)"></button>
    <button onclick = "changeBG(2)"></button>
    <button onclick = "changeBG(3)"></button>
    <script>
        function changeBG(colorChoice) {
            var xmlhttp;
            if (window.XMLHttpRequest != null) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.documentElement.style.setProperty("--bg-color", xmlhttp.responseText)
                }
            }
            xmlhttp.open("GET", "changeColor.php?colorChoice=" + colorChoice, true);
            xmlhttp.send();
        }
    </script>

    <?php
        $choice = $_GET["colorChoice"];
        mysqli_query($con, "UPDATE user SET bgcolor = $choice");
        $color = mysqli_query($con, "SELECT bgColor FROM user WHERE userID = $userID");
        $color = mysqli_fetch_array($color);
        $color = $color["bgColor"];

        if($color == 1) {
            echo "#fffff";
        }
        else if($color == 2) {
            echo "black";  
        }
        else {
            echo "blue";
        }
    ?>
</body>
</html>