<?php
include 'connection.php';

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
        <img height="150px" src="https://my.becode.org/assets/background/becodeseal.png" alt="BeCode Logo">
        <h1>Student Profiles</h1>
    </section>
    <section class="container">
        <div class="pic_container">
            <img class="pic" src="<?= $row['avatar']; ?>" alt="Profile picture" height="200px">
        </div>
        <div class="column">
            <div class="pad flex ">
                <h2 class="ident user"><?= $row['username']; ?></h2>
                <form action="" method="POST">
                    <input type="text" class="ident name" value="<?= $row['first_name']." ". $row['last_name']; ?>">
                </form>
            </div>
            <div class="pad lang"><h4>Language: </h4> <?= "<img style='border: 1px solid' width='40px' src='assets/svg/" . $flag . "' alt='language flag'>" ?></div>
            <div class="pad email"><h4>Email-address: </h4> <?= $row['email']; ?></div>
            <div class="pad linked"><h4>LinkedIn: </h4> <a href="<?= $row['linkedin']; ?>"><?= $row['linkedin']; ?></a></div>
            <div class="pad Git"><h4>GitHub: </h4> <a href="<?= $row['github']; ?>"><?= $row['github']; ?></a></div>
            <div class="pad vid"><h4>Video: </h4> <a href="<?= $row['video']; ?>"><?= $row['video']; ?></a></div>
            <div class="wisdom">
                <div class="pad quote"><h4>Favourite quote: </h4><?= $row['quote']; ?></div>
                <div class="pad author"><h4>Author: </h4><?= $row['quote_author']; ?></div>
            </div>
            <div class="pad bill">
                <?= "<img height='360px' src='https://belikebill.ga/billgen-API.php?default=1&name=" . $row['first_name'] . "&sex=m' />"?>
            </div>

        </div>
    </section>
</body>
</html>