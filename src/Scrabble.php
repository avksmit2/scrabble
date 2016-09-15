<?php
    class Players
    {
        private $score;

        function __construct()
        {
            $score = 0;
        }

        function returnScore($input)
        {
            $input = str_split(strtolower($input));
            $one = array("a");
            $three = array("b");
            foreach ($input as $letter) {
            if (in_array($letter, $one))
            {
                $this->score += 1;
            } elseif (in_array($letter, $three))
            {
                $this->score += 3;
            }
        }
            return $this->score;
        }


    }
?>
