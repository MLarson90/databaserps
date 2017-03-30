<?php
  Class PlayerTwo
  {
    public $move;


    function __construct($move){
      $this->move = $move;
    }
    function getMove(){
      return $this->move;
    }
    function save(){
      $executed = $GLOBALS['DB']->exec("INSERT INTO playertwo (move) VALUES ('{$this->getMove()}')");
    }
    static function getAll(){
      $returned_move = $GLOBALS['DB']->query("SELECT * FROM playertwo;");
     $mademove = null;
     foreach($returned_move as $move) {
         $one_move = $move['move'];
         $mademove = $one_move;
     }
     return $mademove;
 }
    static function deleteAll(){
      $GLOBALS['DB']->exec("DELETE FROM playertwo;");
    }
  }
 ?>
