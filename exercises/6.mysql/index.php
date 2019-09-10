<?php
include 'auth.php';
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true || !isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}


if (file_exists('connection.php')){
    $status = "yay!";
} else {
    $status = "couldn't contact database..";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First MySQL ex.</title>
</head>

<body>

    <section>
        <form action="" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
        <h2>Table:</h2>
        <div>
            <table cellpadding="0" cellspacing="0" border="1px solid">
                <thead>
                    <tr>
                        <th style="width: 50px">id</th>
                        <th style="width: 150px">Name</th>
                        <th style="width: 250px">Email</th>
                        <th style="width: 250px">Quote</th>
                        <th style="width: 150px">Preferred language</th>
                        <th style="width: 150px">Profile pic</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            if (file_exists('connection.php')){
                $conn = openConnection();
                //$query = "SELECT * FROM hopper_2"; //You don't need a ; like you do in SQL
                //print_r($query);
                $result = mysqli_query($conn, "SELECT * FROM hopper_2");
                //print_r($result);

                // echo "<table cellpadding='0' cellspacing='0' border='1px solid'>"; // start a table tag in the HTML

                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                    $lang = strtolower($row['preferred_language']);
                    if ($lang !== "nl"){
                    $flag = $lang.".svg";
                    } else {
                        $flag = "be.svg";
                    };

                    echo
                        "<tr>
                            <td style='width: 50px'>" . $row['id'] . "</td>
                            <td style='width: 150px'>"
                                . "<a href='profile.php?user=" . $row['id'] . "'>" . $row['first_name'] ." ". $row['last_name'] ."</a>" .
                            "</td>
                            <td style='width: 250px'>" . $row['email'] . "</td>
                            <td style='width: 250px'>" . $row['quote'] . "</td>";

                    if ($lang !== "nl"){
                            echo "<td style='width: 150px'><img style='border: 1px solid' width='40px' src='assets/svg/" . $flag . "' alt='language flag'></td>";
                    } else {
                        echo "<td style='width: 150px'><img style='border: 1px solid' width='40px' src='assets/svg/" . $flag . "' alt='language flag'><span> /  </span><img style='border: 1px solid' width='40px' src='assets/svg/nl.svg' alt='language flag'></td>";
                    }

                    echo    "<td style='width: 150px'><img style='border: 1px solid' height='80px' src='" . $row['avatar'] .      "' alt='profile pic'></td>
                        <td style='font-size: 8px'>" . $row['password'] . "</td>" . 
                        "</tr>";  //$row['index'] the index here is a field name
                    };
                // echo "</table>"; //Close the table in HTML

                closeConnection($conn);
            } else {
                    $status = "couldn't contact database..";
                };

            // if (isset($_GET['user'])){
            //     $_SESSION['id'] = $row['id'];
            // }

            // echo $_SESSION['id'];



            // echo
            // "<tr>
            //     <td style='width: 50px'>"."id"."</td>
            //     <td style='width: 150px'>"."placeholder"."</td>
            //     <td style='width: 150px'>"."placeholder"."</td>
            //     <td style='width: 250px'>"."placeholder"."</td>
            //     <td style='width: 150px'>"."placeholder"."</td>
            // </tr>";
            ?>
            </tbody>
            </table>
        </div>
        <?php
        if(isset($_SESSION["username"])){
            echo "<div>Logged in as " . $_SESSION["username"] . ".</div>";
        } else {
            header("location: login.php");
        }

        ?>
    </section>


    <h2><?= $status?></h2>
</body>

</html>