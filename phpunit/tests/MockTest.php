<?php

use PHPUnit\Framework\TestCase;

class SomeClass
{
    public function doSomething()
    {
    }
}


class StubTest extends TestCase
{
    /**
     * @test
     */
    public function mockFunctionWithReturnValue()
    {
        $stub = $this->createMock(SomeClass::class);
        $stub->method('doSomething')
            ->willReturn('foo');
        $this->assertEquals('foo', $stub->doSomething());
    }

    /**
     * @test
     */
    public function mockReturnArgument()
    {
        $stub = $this->createMock(SomeClass::class);

        $stub->method('doSomething')
            ->will($this->returnArgument(0));

        $this->assertEquals('foo', $stub->doSomething('foo'));
        $this->assertEquals('bar', $stub->doSomething('bar'));
    }

    /**
     * @test
     */
    public function mockReturnSelf()
    {
        $stub = $this->createMock(SomeClass::class);


        $stub->method('doSomething')
            ->will($this->returnSelf());


        $this->assertSame($stub, $stub->doSomething());
    }

    /**
     *
     * @test
     */
    public function receiveConcecutiveCalls()
    {
        $stub = $this->createMock(SomeClass::class);
        $stub->method('doSomething')
            ->will($this->onConsecutiveCalls(2,3,4,5));
        $this->assertEquals(2, $stub->doSomething());
        $this->assertEquals(3, $stub->doSomething());
        $this->assertEquals(4, $stub->doSomething());
        $this->assertEquals(5, $stub->doSomething());
    }

    /**
     * @test
     * @expectedException InvalidArgumentException 
     */
    public function mockWillThrowException()
    {
        $stub = $this->createMock(SomeClass::class);

        $stub->method('doSomething')
            ->will($this->throwException(new InvalidArgumentException));
        $stub->doSomething();
    }
}
