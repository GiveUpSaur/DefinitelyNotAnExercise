<?php

interface TextWrapExerciseInterface {

    public static function textWrap(string $text, int $length): array;
}

class Text implements TextWrapExerciseInterface {

    public static function textWrap(string $text, int $length): array {

        $textContent = explode(' ', $text);
        $result[] = "";
        $actualLength = 0;
        $index = 0;

        foreach ($textContent as $word) {

            $wordLength = strlen($word) + 1;

            if (($actualLength + $wordLength) <= $length) {

                $result[$index] .= $word . ' ';
                $actualLength += $wordLength;
            } else {

                if ($wordLength > $length) {

                    $half = strlen($word) + 1;
                    while ($half > $length) {
                        $half /= 2;
                    }

                    $split = str_split($word, $half);

                    foreach ($split as $divided) {
                        $index += 1;
                        $result[$index] = $divided;
                    }
                    $actualLength = $wordLength;
                } else {

                    $index += 1;
                    $actualLength = $wordLength;
                    $result[$index] = $word . ' ';
                }
            }
        }

        //var_dump($result);

        for ($i = 0; $i < sizeof($result); $i++) {
            echo($result[$i]);
            echo "<br>";
        }



        return $result;
    }

}

?>