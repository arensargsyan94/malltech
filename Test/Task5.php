<?php

/**
 *
 * Задача 5.
 *
 * @param $stringNumber1
 * @param $stringNumber2
 * @return string
 */
function bigNumbersSum($stringNumber1, $stringNumber2)
{
    //keep temporary string for assigning longer number to string 1
    $tempString = '';
    if (strlen($stringNumber1) < strlen($stringNumber2)) {
        $tempString = $stringNumber1;
        $stringNumber1 = $stringNumber2;
        $stringNumber2 = $tempString;
    }

    //keep index number if sum of two corresponding values is grater then 10
    $keepCurrentSumNumber = 0;

    //final sum string
    $resultString = '';

    for ($i = 0; $i <= strlen($stringNumber1) - 1; ++$i) {

        //index for every number in string
        $currentIndex1 = strlen($stringNumber1) - 1 - $i;
        $currentIndex2 = strlen($stringNumber2) - 1 - $i;

        $currentNumberStr1 = (int)$stringNumber1[$currentIndex1];
        $currentNumberStr2 = ($currentIndex2 >= 0) ? (int)$stringNumber2[$currentIndex2] : 0;

        $currentSum = (int)($currentNumberStr1 + $currentNumberStr2 + $keepCurrentSumNumber);

        if ($currentSum >= 10) {
            $currentSum = (string)$currentSum;
            $keepCurrentSumNumber = 1;
            $resultString .= $currentSum[1];
        } else {
            $keepCurrentSumNumber = 0;
            $resultString .= $currentSum;
        }
    }
    $resultString = strrev($resultString);

    return $resultString;
}

?>