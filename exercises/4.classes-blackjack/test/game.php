<?php
include 'blackj.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Blackjack Game</title>
</head>

<body>
    <h2 class="center" >Dealer:</h2>
    <div id="dealer" class="dealerPos center">
    <?php
    if(isset($_POST["playGame"]) || isset($_POST["deal"])){ // Start: dealer gets two cards, 1 open, 1 closed.
        $_SESSION["player"] = new Blackjack();
        $_SESSION["dealer"] = new Blackjack();
        createDeck(); // Deck is created in $_SESSION
        $_SESSION["dealer"]->cardCheck();
    } else if ($_POST["stand"]) {
        $_SESSION["dealer"]->stand();
    } else if ($_POST["surrender"]){
        $_SESSION["dealer"]->surrender();
    }
    echo "<div>";
    foreach($_SESSION["dealer"]->hand as $dkey => $value){
        echo "<img src='../assets/cards/".$dkey.".svg' alt='playingcard' height='120px'>";
    };
    if(isset($_POST["playGame"]) || isset($_POST["deal"]) || isset($_POST["hitPlayer"])){
        echo "<img src='../assets/cards/2B.svg' alt='playingcard' height='120px'>";
    }

    echo "</div>";
    if(isset($_POST["playGame"]) || isset($_POST["deal"])){    
        $_SESSION["dealer"]->blindCard();
    }
    ?>
    </div>

    <?php
        echo "<div class='center'>";
        echo "Dealer hand: ",$_SESSION["dealer"]->score;
        echo "</div>";
    ?>

    <div id="result" class="resultPos">
        <h2>Result:</h2>

        <?php
        echo "<div>".$_SESSION["dealer"]->result."</div>";
        echo "<div>".$_SESSION["player"]->result."</div>"
        ?>

    </div>

    <h2 class="center">Player:</h2>
    <div id="player" class="playerPos center">

    <?php
    if(isset($_POST["playGame"]) || isset($_POST["deal"])){ // Start: player gets 2 open cards
        for ($i=0; $i<2; $i++){
            $_SESSION["player"]->cardCheck();
        }
        unset($_POST["playGame"]);
        unset($_POST["deal"]);
    } else if (isset($_POST["hitPlayer"])){
        $_SESSION["player"]->cardCheck();
        $_SESSION["player"]->hitScore();
    }
    echo "<div>";
    foreach($_SESSION["player"]->hand as $pkey => $value){
        echo "<img src='../assets/cards/".$pkey.".svg' alt='playingcard' height='120px'>";
    };
    echo "</div>";
    ?>

    </div>
    <?php
        echo "<div class='center'>";
        echo "Player hand: ",$_SESSION["player"]->score;
        echo "</div>";
    ?>

    <form method="post">
        <input type="submit" value="Hit" name="hitPlayer">
        <input type="submit" name="stand" value="Stand">
        <input type="submit" name="surrender" value="surrender">
        <input type="submit" name="deal" value="Deal again">
    </form>

    <form action="home.php" method="post">
        <input type="submit" value="Go Back to Home" name="goBack">
    </form>
    <div style="display:flex; flex-direction:row">
    
    <?php
    print_r($_SESSION["cards"]);
    echo "</br>";
    echo "Cards left in the deck: ".count($_SESSION["cards"]);
    if(isset($_POST["deal"])){
        session_unset();
    }
    ?>
    </div>

</body>
</html>