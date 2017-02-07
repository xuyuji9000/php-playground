<?php
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase 
{
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
    }

    public function testTrueTwo()
    {
        $this->assertTrue(true);
        $this->assertTrue(true);
    }
}
