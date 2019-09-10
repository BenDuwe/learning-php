<?php
include_once 'auth.php';

?>

    <form action="" method="POST">
        <!-- <div class="edits">
            <label for="username"><h4>Username:</h4></label>
            <input type="text" required name="username" id="username" value="<?php /*echo $row['username'] ?>">
            <span class="error"><?php if (isset($unameError)) echo $unameError */?></span>
        </div> -->
        <div class="edits">
            <label for="firstname"><h4>First name:</h4></label>
            <input type="text" required name="firstname" id="firstname" value="<?php echo $row['first_name'] ?>">
            <span class="error"><?php if (isset($fnameError)) echo $fnameError ?></span>
        </div>
        <div class="edits">
            <label for="lastname"><h4>Last name:</h4></label>
            <input type="text" required name="lastname" id="lastname" value="<?php echo $row['last_name'] ?>">
            <span class="error"><?php if (isset($lnameError)) echo $lnameError ?></span>
        </div>
        <div class="edits">
            <label for="email"><h4>E-mail address:</h4></label>
            <input type="text" required name="email" id="email" value="<?php echo $row['email'] ?>">
            <span class="error"><?php if (isset($emailError)) echo $emailError ?></span>
        </div>
        <!-- <div>
            <label for="password"><h4>Password:</h4></label>
            <input type="password" required name="password" id="password">
            <span class="error"><?php /*if (isset($passError)) echo $passError */?></span>
        </div>
        <div>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" required name="confirmPassword" id="confirmPassword">
            <span class="error"><?php /* if (isset($confPassError)) echo $confPassError */?></span>
        </div> -->
        <div class="edits">
            <label for="linkedin"><h4>LinkedIn profile:</h4></label>
            <input type="text" required name="linkedin" id="linkedin" value="<?php echo $row['linkedin'] ?>">
            <span class="error"><?php if (isset($linkedError)) echo $linkedError ?></span>
        </div>
        <div class="edits">
            <label for="github"><h4>Github profile:</h4></label>
            <input type="text" required name="github" id="github" value="<?php echo $row['github'] ?>">
            <span class="error"><?php if (isset($gitError)) echo $gitError ?></span>
        </div>
        <div class="edits">
            <label for="language"><h4>Preferred language:</h4></label>
            <select name="language" id="language" required>
                <option value="nl">Dutch</option>
                <option value="en">English</option>
                <option value="fr">French</option>
                <option value="pl">Polish</option>
                <option value="de">German</option>
            </select>
        </div class="edits">
        <!-- <div>
            <label for="avatar">Avatar:</label>
            <input type="text" required name="avatar" id="avatar" value="<?php /*if (isset($pic)) echo $pic; */?>">
            <span class="error"><?php /*if (isset($picError)) echo $picError*/ ?></span>
        </div> -->
        <div class="edits">
            <label for="video"><h4>Music video:</h4></label>
            <input type="text" required name="video" id="video" value="<?php echo $row['video'] ?>">
            <span class="error"><?php if (isset($vidError)) echo $vidError ?></span>
        </div>
        <div class="edits">
            <label for="quote"><h4>Favorite quote:</h4></label>
            <input type="text" required name="quote" id="quote" value="<?php echo $row['quote'] ?>">
        </div>
        <div class="edits">
            <label for="author"><h4>Author of quote:</h4></label>
            <input type="text" required name="author" id="author" value="<?php echo $row['quote_author'] ?>">
        </div>
        <input type="submit" name="save" value="Save Profile">

    </form>
