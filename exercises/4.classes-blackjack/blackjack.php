<?php
session_start();

$_SESSION["value"] = ['A',2,3,4,5,6,7,8,9,10,'J','Q','K'];
$_SESSION["suits"] = ['S','C','D','H'];
$_SESSION["cards"] = [];

function createDeck(){
    foreach($_SESSION["value"] as &$x){
        foreach($_SESSION["suits"] as &$y){
            $_SESSION["cards"][$x.$y] = $x;
        }
    }
}

class Blackjack{
    
    public $score;
    /* ********** Create Random Card  ***********  */
    public function randomCard($active){
        return $this->cardCheck($active);
    }
    /*  ********** Start Game Player   **********   */
    public function startPlayer(){
           return $this->randomCard("playerScore");
    }
    
    /*  ********** Start Game Dealer  **********   */
    public function startDealer(){
        return $this->randomCard("dealerScore");;
    }

    public function surrender() {
        while (array_sum($_SESSION["dealerScore"]) < 17){
            $_SESSION["dealerScore"][] = $this->cardCheck("dealerScore");
            if (array_sum($_SESSION["dealerScore"]) >= 17){
                $_SESSION["loser"] = true;
                $this->winDecider();       
                echo "<div id=dealer>",print_r($_SESSION["dealerScore"],true),"</div><br/>";               
            }
        };

        // $_SESSION["dealReady"] = true;
        // header("Refresh:0");

        // make sure dealer hIT loop runs and shows end result.
    }

    function stand(){
        while (array_sum($_SESSION["dealerScore"]) < 17){
            $_SESSION["dealerScore"][] = $this->cardCheck("dealerScore");
            if (array_sum($_SESSION["dealerScore"]) >= 17){
                $this->winDecider();
                echo "<div id=dealer>",print_r($_SESSION["dealerScore"],true),"</div><br/>";               
            }
        };
        // $_SESSION["dealReady"] = true;
        // header("Refresh:0");

        // if ($this->score === 'A'){
        //     $this->score = "1 or 11";
        // }
    }
    
    function cardCheck($active) {
        $key = array_rand ($_SESSION["cards"],1);
        $check = $_SESSION["cards"][$key];
        echo $key."-";
        if ($check === 'A'){
            if(array_sum($_SESSION[$active]) + 11 < 22){
                $check = 11;
                return $check;
            } else {
                $check = 1;
                return $check;
            }
        } else if ($check === 'J' || $check === 'Q' || $check === 'K') {
            $check = 10;
            return $check;
        } else {
            return $check;
        }
    }
    
    function winDecider(){
        if(array_sum($_SESSION["playerScore"]) > 21 || $_SESSION["loser"] === true){
           $_SESSION["result"] = " YOU LOSE ";
        }else if(array_sum($_SESSION["playerScore"]) > array_sum($_SESSION["dealerScore"]) || array_sum($_SESSION["dealerScore"]) > 21 ){
            $_SESSION["result"] =  " YOU WIN ";
        }else if(array_sum($_SESSION["playerScore"]) < array_sum($_SESSION["dealerScore"])){
            $_SESSION["result"] = " DEALER WINS ";
        }else if(array_sum($_SESSION["playerScore"]) === array_sum($_SESSION["dealerScore"])){
            $_SESSION["result"] = " TIE ";
        }
    }
}

?>