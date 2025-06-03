<?php

function noIterate($strArr)
{
    $mainString = $strArr[0];
    $subString = $strArr[1];

    $j = 0;

    $necessaryCharacters = array_count_values(str_split($subString));
    $foundedCharacters = [];
    $missingCharacters = count($necessaryCharacters);
    $minLen = 50;
    $minString = '';

    for ($i = 0; $i < strlen($mainString); $i++) {
        $endChar = $mainString[$i];

        if (isset($necessaryCharacters[$endChar])) {
            $foundedCharacters[$endChar] = ($foundedCharacters[$endChar] ?? 0) + 1;
            if ($foundedCharacters[$endChar] === $necessaryCharacters[$endChar]) {
                $missingCharacters--;
            }
        }

        while ($missingCharacters === 0) {
            $newSubStringLen = $i - $j + 1;
            if ($newSubStringLen < $minLen) {
                $minLen = $newSubStringLen;
                $minString = substr($mainString, $j, $minLen);
            }

            $startChar = $mainString[$j];
            if (isset($necessaryCharacters[$startChar])) {
                $foundedCharacters[$startChar]--;
                if ($foundedCharacters[$startChar] < $necessaryCharacters[$startChar]) {
                    $missingCharacters++;
                }
            }

            $j++;
        }
    }

    return $minString;
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);
