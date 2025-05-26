<?php
$name = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../CSS/additional.css">
</head>

<body>
    <div class="wrapper">
        <!-- Yang dari file sebelum -->
        <div class="create">
            <div class="form">
                <span class="form">Main Register</span>
                <form method="post">
                    <div class="inputbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" <?php echo "value='$name'" ?>>
                        <i class='bx bxs-user' id="user"></i>
                    </div>
                    <div class="inputbox">
                        <label for="password">Email</label>
                        <input type="email" name="email" <?php echo "value='$email'" ?>>
                        <i class='bx  bx-envelope-open' id="email"></i>
                    </div>
                    <div class="inputbox">
                        <label for="password">Password</label>
                        <input type="text" name="password" <?php echo "value='$password'" ?>>
                        <i class='bx bxs-lock' id="pw"></i>
                    </div>

                    <button class="btn" name="button" value="Update">Update</button>
                </form>
            </div>
        </div>

        <!-- Additional Data -->
        <div class="add">

            <div class="form">
                <span class="form">Additional Data</span>
                <form method="post">
                    <div class="inputbox">
                        <label for="Birth">Birth Date</label>
                        <input type="date" name="birth" placeholder="Your Birth Date..." required>
                    </div>
                    <div class="inputbox">
                        <label for="Phone Number">Phone Number</label>
                        <input type="text" name="phone" placeholder="Your Phone Number...">
                    </div>

                    <div class="inputbox">
                        <label for="Location">Location</label>
                        <input type="text" id="locationInput" name="location" placeholder="Your Location..." onkeyup="searchLocation()">
                        <div id="suggestions"></div>
                        <hr style="background-color: black; height: 2px;">
                    </div>

                    <div class="inputbox" id="gender">
                        <label for="Gender">Gender</label>
                        <div class="wrapGender">
                            <label class='radio-option' id="man">
                                <input type="radio" name="gender" value="Male" required>
                                <span class='radio-text'><span>Male</span></span>
                            </label>
                            <label class='radio-option' id="woman">
                                <input type="radio" name="gender" value="Female" required>
                                <span class='radio-text'><span>Female</span></span>
                            </label>
                            <label class='radio-option' id="nts">
                                <input type="radio" name="gender" value="Not To Say" required>
                                <span class='radio-text'><span>Not To Say</span></span>
                            </label>
                        </div>
                    </div>
                    <div class="inputbox">
                        <label for="Bio">Bio</label>
                        <textarea name="bio" id="bio" rows="3" cols="75"></textarea>
                    </div>

                    <button class="btn" name="button" value="Submit">Sign Up</button>
                </form>
            </div>
        </div>
</body>

<?php
include('../../Connection/Connection.php');

// Data
$username = $_GET['username'];
$email = $_GET['email$email'];
$password = $_GET['password'];
$birth = $_POST['birth'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$bio = $_POST['bio'];

echo $birth;
echo $phone;
echo $location;
echo $bio;


// $query = "INSERT INTO user (username, email, password, date_of_birth, location, phone, gender, bio, role) VALUES (
//     'marvel99',
//     'marvel@example.com',
//     'hashed_password_123', 
//     '2002-06-01',
//     'Bandung',
//     '08123456789',
//     'Male',
//     'Just a chill guy who codes a lot.',
//     'member'
// );
// "
?>


<script>
    let xmlData;

    window.onload = function() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../../XML/location.xml", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                xmlData = xhr.responseXML;
            }
        };
        xhr.send();
    };

    function searchLocation() {
        let input = document.getElementById("locationInput").value.toLowerCase();
        let suggestions = document.getElementById("suggestions");
        suggestions.innerHTML = "";

        if (input.length === 0 || !xmlData) return;

        let locations = xmlData.getElementsByTagName("location");

        for (let i = 0; i < locations.length; i++) {
            let loc = locations[i].textContent;
            if (loc.toLowerCase().includes(input)) {
                let div = document.createElement("div");
                div.innerHTML = loc;
                div.style.padding = "5px";
                div.style.cursor = "pointer";
                div.onclick = function() {
                    document.getElementById("locationInput").value = loc;
                    suggestions.innerHTML = "";
                };
                suggestions.appendChild(div);
            }
        }
    }
</script>


</html>
<!-- Birth ; Location ; Gender ; Bio  -->