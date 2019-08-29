<?php
include 'blackjack.php';
$player = new Blackjack();
$dealer = new Blackjack();
$_SESSION["playerScore"];
$_SESSION["dealerScore"];
$_SESSION["result"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Blackjack Game</title>
</head>

<body>
    <!--  ***************    DEALER AREA  *****************     -->

    <div id="dealer" class="dealer" style="border: 2px solid black; overflow: auto">
        <p>Dealer</p>

        <?php
            if(isset($_POST["playGame"])){ // Start: dealer gets two cards, 1 open, 1 closed.
                createDeck(); // Deck is created in $_SESSION
                $_SESSION["dealerScore"][] = $dealer->randomCard("dealerScore"); // open card
                print_r($_SESSION["dealerScore"]); 
                $_SESSION["closed"] = $dealer->randomCard("dealerScore"); // closed card
            }else if(isset($_POST["hitPlayer"])){ // needed to keep dealer card visible during hit from player
                print_r($_SESSION["dealerScore"]);
              }
            else  if (isset($_POST["stand"])){ // when player stands dealer takes cards until over 17 total
                $dealer->stand(); // after reaching a total higher than 17 the winner will be decided
                var_dump( array_sum($_SESSION["dealerScore"]));
            }else if (isset($_POST["surrender"])) { // when player surrenders dealer still takes cards until over 17 total, to see what could have been.
                $dealer->surrender(); // player always loses
                var_dump( array_sum($_SESSION["dealerScore"]));
            }
        ?>
    </div>
    </div>
    <!--  **********************************************************************  -->

    <div>
    <p>Result:</p>
    <?php 
        echo ($_SESSION["result"]); // shows who won/lost in the end.      
    ?>
    </div>
    <div class="playField">
        <!-- ***************    PLAYER AREA   *****************   -->
        <div class="player" style="border: 2px solid black; overflow: auto;">
            <p>Player</p>
            <?php
          if(isset($_POST["playGame"])){
            for ($i=0;$i<2;$i++){
                $_SESSION["playerScore"][] = $player->randomCard("playerScore");
            }
            print_r($_SESSION["playerScore"]);
          }

          if(isset($_POST["hitPlayer"])){
            $_SESSION["playerScore"][] = $player->randomCard("playerScore");
            print_r($_SESSION["playerScore"]);
          }
          
          if (isset($_POST["stand"]) || isset($_POST["surrender"])){
            print_r($_SESSION["playerScore"]);
            var_dump( array_sum($_SESSION["playerScore"]));
          }
        ?>
        </div>
        <!-- ***************    AREA VOOR FUNCTIE HIT  (NOG AAN TE MAKEN ) ********** -->
        <div class="hitPlayer">
            <!-- ***************  AREA for Surrender and Stand ***************-->
            <div class="player">
                <?php 
            ?>
            </div>
            <!-- ***************     FORM for buttons      ************* -->
            <form method="post">
                <input type="submit" value="Hit" name="hitPlayer">
                <input type="submit" name="stand" value="Stand">
                <input type="submit" name="surrender" value="surrender">
            </form>
        </div>

        <!--  ***********************************************************************  -->

        <!--  ******* BUTTON OM TERUG TE GAAN NAAR HOME.PHP ( DELETE NA TESTEN !!!!)  -->

        <form action="home.php" method="post">
            <input type="submit" value="Go Back to Home" name="playGame">
        </form>

<?php
 print_r($_SESSION["cards"]);
?>

</body>

</html>