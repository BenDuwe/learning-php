<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>

    <form id="register" action="" method="POST">
        <fieldset id="registerField" class="field">
            <legend>Registration</legend>
            <div>
                <label for="Username">Username:</label>
                <input type="text" id="Username" name="username" placeholder="Choose a username" required />
            </div>
            <div class="submitbtn">
                <input name="submit" id="submit" type="submit" value ="Submit information"/>
            </div>
        </fieldset>
    </form>

<?php
if (!empty($_POST)){
    $username = $_POST["username"];
    echo "<p>Welcome, ".$username."</p>";
    };
?>

</body>

</html>