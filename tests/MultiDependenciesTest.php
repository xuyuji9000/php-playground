<?php

use PHPUnit\Framework\TestCase;

class MultiDependenciesTest extends TestCase
{
    public function testProducerFirst()
    {
        $this->assertTrue(TRUE);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(TRUE);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(['first', 'second'], func_get_args());
    }
}
