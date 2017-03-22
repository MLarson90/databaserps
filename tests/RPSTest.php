<?php

    require_once "src/RPS.php";

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {

        function test_if_equal()
        {
            //Arrange
            $test_RockPaperScissors = new RPS;
            $first_input = "rock";
            $second_input = "rock";

            //Act
            $result = $test_RockPaperScissors->checkWinner($first_input, $second_input);

            //Assert
            $this->assertEquals(false, $result);
        }
        function test_rock_scissors()
        {
            //Arrange
            $test_RockPaperScissors = new RPS;
            $first_input = "rock";
            $second_input = "scissors";

            //Act
            $result = $test_RockPaperScissors->checkWinner($first_input, $second_input);

            //Assert
            $this->assertEquals("Player 1", $result);
        }
        function test_rock_paper()
        {
          $test_RockPaperScissors = new RPS;
          $first_input = "paper";
          $second_input = "rock";

          $result = $test_RockPaperScissors->checkWinner($first_input, $second_input);
          $this->assertEquals("Player 1", $result);

        }
        function test_paper_scissor()
        {
          $test_RockPaperScissors = new RPS;
          $first_input = "scissors";
          $second_input = "paper";
          $result= $test_RockPaperScissors->checkWinner($first_input, $second_input);
          $this->assertEquals("Player 1", $result);
        }
        function test_player2_win()
        {
          $test_RockPaperScissors = new RPS;
          $first_input = "paper";
          $second_input = "scissors";
          $result = $test_RockPaperScissors->checkWinner($first_input,$second_input);
          $this->assertEquals("Player 2", $result);
        }
    }

?>
