<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once 'index.php';

class Challenge02Test extends TestCase
{
    static public function useCasesprovider(): array
    {
        return [
            'example 1 from readme' => [['ahffaksfajeeubsne', 'jefaa'], 'aksfaje'],
            'example 2 from readme' => [['aaffhkksemckelloe', 'fhea'], 'affhkkse'],
            'example 3 from enunciate' => [['aaabaaddae', 'aed'], 'dae'],
            'example 4 from enunciate' => [['aabdccdbcacd', 'aad'], 'aabd'],
        ];
    }

    #[DataProvider('useCasesprovider')]
    public function test($array, $result)
    {
        $this->assertEquals($result, noIterate($array));
    }
}
