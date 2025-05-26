<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting Form</title>
</head>
<body>
    <form method = "post" enctype="multipart/form-data">
        Caption<br>
        <input type = "text" name = "caption">
        <br>
        Posting<br>
        <input type = "file" name = "postPhoto" required>
        <br>
        <input type = "submit" name = "upload">

    </form>

    <?php
    include('../Connection/Connection.php');

    if (isset($_POST['upload'])) {
        $caption = $_POST['caption'];
        $posting = $_FILES['postPhoto']['name'];
        $temporary = $_FILES['postPhoto']['tmp_name'];

        move_uploaded_file($temporary, "pict/" . $posting);

        $filepath = "pict/" . $posting;
        $insert = "INSERT INTO post (caption, gambar) VALUES 
                    ('$caption', '$filepath')";

        if (mysqli_query($connection, $insert)) {
            echo "Posting Successful";
        }
        else{
            echo "Posting Unsuccessful";
        }
        
        
    }

    


    ?>
</body>
</html>