<?php
    class PlayerOne
    {
          public $move;

          function __construct($move){
            $this->move = $move;
          }

          function checkWinner($player1, $player2) {
            if ($player1 == $player2) {
              return "Tie";
            }elseif ((($player1=="rock") && ($player2 =="scissors")) || (($player1 == "paper") && ($player2 == "rock")) || (($player1 == "scissors") && ($player2 == "paper"))) {
              return "Player 1";
            }else{
              return "Player 2";
            }
          }
          function getMove(){
            return $this->move;
          }
          function save(){
            $executed = $GLOBALS['DB']->exec("INSERT INTO playerone (move) VALUES ('{$this->getMove()}')");
          }
          static function getAll(){
            $returned_move = $GLOBALS['DB']->query("SELECT * FROM playerone;");
           $mademove = null;
           foreach($returned_move as $move) {
               $one_move = $move['move'];
               $mademove = $one_move;
           }
           return $mademove;
       }

          static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM playerone;");
          }
      }

?>
