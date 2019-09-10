<?php
//include_once 'connection.php';
include_once 'auth.php';

// Check if the user is already logged in, if yes then redirect him to index page = table with all profiles
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" required name="username" id="username">
            <span><?php echo $user_err; ?></span>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password">
            <span><?php echo $password_err; ?></span>
        </div>
        <?php echo "<div>" . $login_err . "</div>"; ?>
        <div>
            <input type="submit" name="login" value="Login">
        </div> 
    </form>


</body>
</html>