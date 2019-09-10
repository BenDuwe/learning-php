<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>

    <form id="register" action="transfer.php" method="POST" enctype="multipart/form-data">
        <fieldset id="registerField" class="field">
            <legend>Registration</legend>
            <div> 
                <label for="profile_photo">Profile Photo:</label>
                <input id="profile_photo" type="file" name="profile_photo" placeholder="Photo">
            </div>
            <div>
                <label for="Username">Username:</label>
                <input type="text" id="Username" name="username" placeholder="Choose a username" required />
            </div>
            <div>
                <label for="Firstname">Firstname:</label>
                <input type="text" id="Firstname" name="firstname" placeholder="Enter your firstname" required />
            </div>
            <div>
                <label for="Lastname">Lastname:</label>
                <input type="text" id="Lastname" name="lastname" placeholder="Enter your lastname" required />
            </div>
            <div>
                <label for="Email">Username:</label>
                <input type="email" id="Email" name="email" placeholder="Enter you email-address" required />
            </div>
            <div>
                <label for="Birthdate">Username:</label>
                <input type="date" id="Birthdate" name="birthday" placeholder="What is your birthday?" required />
            </div>
            <div class="submitbtn">
                <input name="submit" id="submit" type="submit" value ="Submit information"/>
            </div>
        </fieldset>
    </form>

<?php
// if (!empty($_POST)){
//     $username = $_POST["username"];
//     $firstname = $_POST["firstname"];
//     $lastname = $_POST["lastname"];
//     $email = substr($_POST["email"], 0, strpos($_POST["email"], "@"));
//     $birthday = $_POST["birthday"];
//     $manipulate = explode("-", $birthday);
//     $manipulate[0] = $manipulate[0] - 10;
//     $older = implode("-", $manipulate);
//     echo
//     "<p>Welcome, ".$username."</p>
//     <p>Firstname: ".$firstname."</p>
//     <p>Lastname: ".$lastname."</p>
//     <p>Email-address: ".$email."</p>
//     <p>Birthday: ".$birthday."</p>
//     <p>Older birthday: ".$older."</p>";
//     };
?>

</body>

</html>