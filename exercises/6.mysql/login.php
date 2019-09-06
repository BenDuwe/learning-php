<?php
//include_once 'connection.php';
include_once 'auth.php';
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
    <form action="insert.php" method="POST">
        <div>
            <label for="email">E-mail address:</label>
            <input type="text" required name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password">
        </div>
        <div>
            <input type="submit" name="submit" value="Login">
        </div> 
    </form>


</body>
</html>