<?php
include_once 'auth.php';

echo $_SESSION['edit'];

if(isset($_GET['user']))
  $id = $_GET['user'];  

$conn = openConnection();

$result = mysqli_query($conn, "SELECT * FROM hopper_2 WHERE id=$id");
$row = mysqli_fetch_array($result);

closeConnection($conn);

$lang = strtolower($row['preferred_language']);
if ($lang !== "nl"){
$flag = $lang.".svg";
} else {
    $flag = "be.svg";
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profiles</title>
</head>
<body>
    <section class="header">
        <div class="title">
            <img height="150px" src="https://my.becode.org/assets/background/becodeseal.png" alt="BeCode Logo">
            <h1>Student Profiles</h1>
        </div>
        <?php
        if(isset($_SESSION["username"])){
            echo 
                "<div>
                    <div>Logged in as " . $_SESSION["username"] . "</div>
                    <form method='POST'>   
                        <input type='submit' name='logout' value='logout'/>
                    </form>
                </div>";
        } else {
            echo 
                "<div>You are not logged in. <a href='login.php'>Login</a></div>";
;
        }

        ?>
    </section>
    <section class="container">
        <div class="pic_container">
            <h2 class="ident user"><?= $row['username']; ?></h2>
            <img class="pic" src="<?= $row['avatar']; ?>" alt="Profile picture" height="200px">
            <?php

            if ($_SESSION["id"] == $row['id']){
                echo
                    '<form action="" method="POST">
                        <input type="submit" name="edit" value="Edit Profile">
                        <input type="submit" name="delete" value="Delete profile">
                    </form>';
                }
            echo "<div>".$update."</div>";
            ?>
            <!-- <form action="" method="POST">
                <input type="submit" name="edit" value="Edit Profile">
                <input type="submit" name="delete" value="Delete profile">
            </form> -->
        </div>
        <div class="column">
        <?php
        // include 'profiletempl.php';
        if (isset($_POST['edit'])){
            if ($_SESSION["id"] == $_GET['user']){
                $edit = "editing";
            }
        }

        if(isset($_POST['delete'])){
            if ($_SESSION["id"] == $_GET['user']){
             echo 
                 "<div class='alert'>
                     <div> Are you sure you want to delete your profile?</div>
                     <form method='POST'>
                         <input type='submit' name='yes' value='Confirm'/>
                         <input type='submit' name='cancel' value='Cancel'/>
                     </form>
                 </div>";
            } else {
                echo 
                    "<div class='alert'>
                        <div> You are not allowed to delete this profile.</div>
                        <form method='POST'>
                            <input type='submit' name='back' value='Back'/>
                        </form>
                    </div>";
            }
        }

        if ($edit == ''){
            include 'profiletempl.php';
        } else {
                include 'profileedit.php';
        }

        ?>
        </div>
    </section>
</body>
</html>