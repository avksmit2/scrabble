<?php
    class Players
    {
        public $score;

        function __construct()
        {
            $this->score = 0;
        }

        function returnScore($input)
        {
            $input = str_split(strtolower($input));
            $letters = array("e"=>1, "a"=>1, "i"=>1, "b"=>3, "o"=>1, "u"=>1, "l"=>1, "r"=>1, "s"=>1, "t"=>1, "d"=>2, "g"=>2, "c"=>3, "m"=>3, "p"=>3, "f"=>4, "h"=>4, "v"=>4, "w"=>4, "y"=>4, "k"=>5, "j"=>8, "x"=>8, "q"=>10, "z"=>10);

            foreach ($input as $letter) {
                foreach ($letters as $value => $letter_value) {
                    if ($letter == $value)
                    {
                        $this->score += $letter_value;
                    }
                }
            }
            return $this->score;
        }

        static function deleteAll()
        {
            $_SESSION['player1'] = "";
            $_SESSION['player2'] = "";
        }
    }
?>
