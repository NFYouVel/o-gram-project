<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/postingform.css">
    <title>Posting Form</title>
</head>
<body>
        <?php
            session_start();
            $id = $_SESSION['user_id'];
        ?>
    <form method = "post" enctype="multipart/form-data" action="../layout/home.php?id=<?php echo $id;?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Caption 
        <input type = "text" name = "caption">
        Posting
        <input type = "file" name = "postPhoto" required>
        <input type = "submit" name = "upload">

    </form>

    
</body>
</html>