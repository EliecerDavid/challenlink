<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once 'index.php';

class Challenge01Test extends TestCase
{
    static public function useCasesprovider(): array
    {
        return [
            [['1, 3, 4, 7, 13', '1, 2, 4, 13, 15'], '1, 4, 13'],
            [['1, 3, 9, 10, 17, 18', '1, 4, 9, 10'], '1, 9, 10'],
        ];
    }

    #[DataProvider('useCasesprovider')]
    public function test($array, $result)
    {
        $this->assertEquals($result, findPoint($array));
    }
}
