<?php

function findPoint($strArr)
{
    $firstArray = explode(', ', $strArr[0]);
    $secondArray = explode(', ', $strArr[1]);

    $intersectedNumbers = [];
    foreach ($firstArray as $number) {
        if (in_array($number, $secondArray)) {
            $intersectedNumbers[] = $number;
        }
    }

    if ($intersectedNumbers) {
        return implode(', ', $intersectedNumbers);
    } else {
        return 'false';
    }
}

echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
