<?php
include 'terminal.php';
$terminal = new Terminal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <title>Terminal</title>
</head>
<body>

    <div id="titlebar" class="titlebar">
        <div class="title"><?php echo $terminal->startStr ?></div>
    </div>
    <div id="taskbar" class="taskbar">
        <div class="menu">File</div>
        <div class="menu">Edit</div>
        <div class="menu">View</div>
        <div class="menu">Search</div>
        <div class="menu">Terminal</div>
        <div class="menu">Help</div>
    </div>
    <div id="terminal" class="center terminal">
        <div id="history">

        </div>
        <div id="input">
            <?php
            echo "<div class='green'>".$terminal->startStr."</div>";
            ?>
        </div>


    </div>
</body>
</html>