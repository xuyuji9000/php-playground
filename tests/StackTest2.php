<?php

use PHPUnit\Framework\TestCase;

class StackTest2 extends TestCase
{
    protected $stack;

    protected function setUp()
    {
        $this->stack = [];
    }

    public function testEmpty()
    {
        $this->assertTrue(empty($this->stack));
    }

    public function testPush()
    {
        $this->assertEquals(0, count($this->stack));
        array_push($this->stack, 'Mary');
        $this->assertEquals(1, count($this->stack));
        $this->assertEquals('Mary', $this->stack[count($this->stack)-1]);

    }

    public function testPop()
    {
        $this->assertEquals(0, count($this->stack));
        array_push($this->stack, 'Mary');
        $this->assertEquals(1, count($this->stack));
        $this->assertEquals('Mary', array_pop($this->stack));
        $this->assertEquals(0, count($this->stack));
    }
}
