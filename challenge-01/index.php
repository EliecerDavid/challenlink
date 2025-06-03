<?php

function findPoint($strArr, $separator = ', ')
{
    $firstArray = explode($separator, $strArr[0]);
    $secondArray = explode($separator, $strArr[1]);

    $intersectedArray = array_intersect($firstArray, $secondArray);
    return  $intersectedArray ? implode($separator, $intersectedArray) : 'false';
}

echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
