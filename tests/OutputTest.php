<?php
use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    public function testExpectFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }
}
