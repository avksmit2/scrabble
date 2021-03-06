<?php
    require_once __DIR__. "/../src/Scrabble.php";

    class PlayersTest extends PHPUnit_Framework_TestCase
    {
        function test_returnScore_oneLetter()
        {
            // Assemble
            $test_returnScore = new Players;
            $input = "a";

            // Act
            $result = $test_returnScore->returnScore($input);

            // Assert
            $this->assertEquals(1, $result);
        }

        function test_returnScore_twoLetters()
        {
          // Assemble
          $test_returnScore = new Players;
          $input = "ab";

          // Act
          $result = $test_returnScore->returnScore($input);

          // Assert
          $this->assertEquals(4, $result);

        }

        function test_returnScore_ignoreNumbers()
        {
          // Assemble
          $test_returnScore = new Players;
          $input = "1Ab";

          // Act
          $result = $test_returnScore->returnScore($input);

          // Assert
          $this->assertEquals(4, $result);
        }

        function test_returnScore_multipleLetters()
        {
          // Assemble
          $test_returnScore = new Players;
          $input = "iAeb";

          // Act
          $result = $test_returnScore->returnScore($input);

          // Assert
          $this->assertEquals(6, $result);
        }
    }
?>
