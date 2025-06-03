<?php

use PHPUnit\Framework\TestCase;

require_once 'index.php';

class Challenge01Test extends TestCase
{
    public function test()
    {
        $this->assertEquals('1, 4, 13', findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']));
    }
}
