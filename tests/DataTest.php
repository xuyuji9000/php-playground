<?php

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 5, 6]
        ];
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($a+$b, $expected);
    }
}
