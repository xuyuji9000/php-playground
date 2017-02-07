<?php

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testEmpty() 
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'Mary');
        $this->assertEquals(1, count($stack));
        $this->assertEquals('Mary', $stack[count($stack)-1]);
        return $stack;
    }
/*
    public function testPushAndPop() 
    {
        $stack = [];
        $this->assertEquals(0, count($stack));
        array_push($stack, 'Mary');
        $this->assertEquals(1, count($stack));
        $this->assertEquals('Mary', $stack[count($stack)-1]);

        $this->assertEquals('Mary', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
*/
}
