<?php
session_start();

/* ************************* Creating a 52 card deck: ************************ */
 
$_SESSION["value"] = ['A',2,3,4,5,6,7,8,9,'T','J','Q','K'];
$_SESSION["suits"] = ['S','C','D','H'];
$_SESSION["cards"];

function createDeck(){
    foreach($_SESSION["value"] as &$x){
        foreach($_SESSION["suits"] as &$y){
            $_SESSION["cards"][$x.$y] = $x;
        }
    }
}
/* *************************************************************************** */

/* ******************************* Create class ****************************** */
class Blackjack{

    public $score;
    public $hand;
    public $blind;
    public $result;

    public function cardCheck() {
        $key = array_rand($_SESSION["cards"],1);
        $check = $_SESSION["cards"][$key];
        //echo $key." ";
        unset($_SESSION["cards"][$key]);
        if ($check === 'A'){
            if(array_sum($this->hand) + 11 < 22){
                $check = 11;
                //$this->score[$key] = $check;
            } else {
                $check = 1;
                //$this->score[$key] = $check;
            }
        } else if ($check === 'J' || $check === 'Q' || $check === 'K'|| $check === 'T') {
            $check = 10;
            //$this->score[$key] = $check;
        } //else {
            //$this->score[$key] = $check;
        //}
        $this->hand[$key] = $check;
        $this->score = array_sum($this->hand);
    }

    public function blindCard() {
        $key = array_rand($_SESSION["cards"],1);
        $check = $_SESSION["cards"][$key];
        //echo $key." ";
        unset($_SESSION["cards"][$key]);
        if ($check === 'A'){
            if(array_sum($this->hand) + 11 < 22){
                $check = 11;
            } else {
                $check = 1;
            }
        } else if ($check === 'J' || $check === 'Q' || $check === 'K'|| $check === 'T') {
            $check = 10;
        }
        $this->blind[$key] = $check;
    }

    public function hitScore(){
        if(array_sum($this->hand)>21){
            $this->result = " TO GREEDY! ";
            header("Refresh:0");
        };
    }

    public function stand(){
        $this->hand = array_merge($this->hand, $this->blind);
        while(array_sum($this->hand) < 17){
            $this->cardCheck();
        }
        $this-> whoWon();
    }

    public function surrender(){
        $this->hand = array_merge($this->hand, $this->blind);
        $this->result = " PLAYER HAS SURRENDERED! ";
        while(array_sum($this->hand) < 17){
            $this->cardCheck();
        }
        $this->score = array_sum($this->hand);
    }

    public function whoWon(){
        $this->score = array_sum($this->hand);
        if($_SESSION["player"]->score > $_SESSION["dealer"]->score || $_SESSION["dealer"]->score > 21 ){
            $this->result =  " PLAYER WINS ";
        }else if($_SESSION["player"]->score < $_SESSION["dealer"]->score){
            $this->result = " DEALER WINS ";
        }else if($_SESSION["player"]->score === $_SESSION["dealer"]->score){
            $this->result = " TIE! ";
        }
        header("Refresh:0");
    }

}
/* ******************************************************************************* */
?>