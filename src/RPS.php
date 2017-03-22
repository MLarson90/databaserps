<?php
    class RPS
    {
          public $input;

          function __construct($something){
            $this->input = $something;
          }

          function checkWinner($player1, $player2) {
            if ($player1 == $player2) {
              return "Tie";
            }elseif (($player1=="rock") && ($player2 =="scissors") || ($player1 == "paper") && ($player2 == "rock") || ($player1 == "scissors") && ($player2 == "paper")) {
              return "Player 1";
            }else{
              return "Player 2";
            }
          }
          function save(){
            array_push($_SESSION['list_of_input'], $this);
          }
          static function deleteAll(){
            $_SESSION['list_of_input'] = array();
            $_SESSION['list_of_pTwo']= array();
          }
          static function getAll(){
            return $_SESSION['list_of_input'];
          }
          function save_two(){
            array_push($_SESSION['list_of_pTwo'], $this);
          }

}

?>
