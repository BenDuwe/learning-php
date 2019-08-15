<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Exercise 2</title>
</head>

<?php
$names = array(
    "Kirito",
    "Erza",
    "Akatsuki",
    "Shiro",
    "Leo",
    "Rundel-Haus-Code",
    "Ken Kaneki",
    "Glenn Radars",
    "Momonga-Sama"
);
?>

<body>
    <form id="form" action="" method="GET">
        <fieldset id="registerField" class="field">
            <legend>Number of visible rows</legend>
            <div>
                <label for="rowsnumber">Number of rows:</label>
                <input type="number" id="rowsnumber" name="rowsnumber" min="0" required />
            </div>
            <div class="submitbtn">
                <input name="submit" id="submit" type="submit"/>
            </div>
        </fieldset>
    </form>


    <section>
        <h1>Table exercise</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Row number</th>
                        <th>Name</th>
                        <th>Random number between 1 and 25</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php
                        $rows = $_GET["rowsnumber"];
                        for ($i=0 ; $i < $rows ; $i++){
                        echo
                        "<tr>
                            <td>".($i+1)."</td>
                            <td>".$names[rand(0,count($names)-1)]."</td>
                            <td>".rand(1,25)."</td>
                        </tr>";
                        };
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>