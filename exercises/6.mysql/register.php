<?php
//include_once 'connection.php';
include_once 'auth.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First MySQL ex.</title>
</head>
<body style="padding-left:50px">
    <h2>Registration form:</h2>
    <form action="" method="POST">
        <div>
            <label for="firstname">First name:</label>
            <input type="text" required name="firstname" id="firstname" value="<?php if (isset($fname)) echo $fname; ?>">
            <span class="error"><?php if (isset($fnameError)) echo $fnameError ?></span>
        </div>
        <div>
            <label for="lastname">Last name:</label>
            <input type="text" required name="lastname" id="lastname" value="<?php if (isset($lname)) echo $lname; ?>">
            <span class="error"><?php if (isset($lnameError)) echo $lnameError ?></span>
        </div>
        <div>
            <label for="email">E-mail address:</label>
            <input type="text" required name="email" id="email" value="<?php if (isset($emailv)) echo $emailv; ?>">
            <span class="error"><?php if (isset($emailError)) echo $emailError ?></span>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" required name="username" id="username" value="<?php if (isset($uname)) echo $uname; ?>">
            <span class="error"><?php if (isset($unameError)) echo $unameError ?></span>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password">
            <span class="error"><?php if (isset($passError)) echo $passError ?></span>
        </div>
        <div>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" required name="confirmPassword" id="confirmPassword">
            <span class="error"><?php if (isset($confPassError)) echo $confPassError ?></span>
        </div>
        <div>
            <label for="linkedin">LinkedIn profile:</label>
            <input type="text" required name="linkedin" id="linkedin" value="<?php if (isset($linked)) echo $linked; ?>">
            <span class="error"><?php if (isset($linkedError)) echo $linkedError ?></span>
        </div>
        <div>
            <label for="github">Github profile:</label>
            <input type="text" required name="github" id="github" value="<?php if (isset($git)) echo $git; ?>">
            <span class="error"><?php if (isset($gitError)) echo $gitError ?></span>
        </div>
        <div>
            <label for="language">Preferred language:</label>
            <select name="language" id="language" required>
                <option value="nl">Dutch</option>
                <option value="en">English</option>
                <option value="fr">French</option>
                <option value="pl">Polish</option>
                <option value="de">German</option>
            </select>
        </div>
        <div>
            <label for="avatar">Avatar:</label>
            <input type="text" required name="avatar" id="avatar" value="<?php if (isset($pic)) echo $pic; ?>">
            <span class="error"><?php if (isset($picError)) echo $picError ?></span>
        </div>
        <div>
            <label for="video">Music video:</label>
            <input type="text" required name="video" id="video" value="<?php if (isset($vid)) echo $vid; ?>">
            <span class="error"><?php if (isset($vidError)) echo $vidError ?></span>
        </div>
        <div>
            <label for="quote">Favorite quote:</label>
            <input type="text" required name="quote" id="quote" value="<?php if (isset($favQuote)) echo $favQuote; ?>">
        </div>
        <div>
            <label for="author">Author of quote:</label>
            <input type="text" required name="author" id="author" value="<?php if (isset($quoteAuth)) echo $quoteAuth; ?>">
        </div>
        <div>
            <input type="submit" name="submit" value="Submit form">
        </div> 
    </form>



    <h2><?= $status?></h2>
</body>
</html>
