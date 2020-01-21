<?php

use PHPUnit\Framework\TestCase;

class Subject
{
    protected $observers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function doSomething()
    {
        $this->notify('something');
    }


    public function doSomethingBad()
    {
        foreach($this->observers as $observer)
        {
            $observer->reportError(42, 'Something bad happened.', $this);
        }
    }

    protected function notify($argument)
    {
        foreach($this->observers as $observer)
        {
            $observer->update($argument);
        }
    }
}

class Observer
{
    public function update($argument)
    {
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
    }
}

class MockObjectTest extends TestCase
{
    /**
     * @test
     */
    public function observersAreUpdated()
    {
        $observer= $this->getMockBuilder(Observer::class)
            ->setMethods(['update'])
            ->getMock();

        $observer->expects($this->exactly(2))
            ->method('update')
            ->withConsecutive(
                [$this->equalTo('something')],
                [$this->equalTo('something')]
            );

        $subject = new Subject('My Subject');

        $subject->attach($observer);
        $subject->attach($observer);

        $subject->doSomething();
    }

    /**
     * @test
     */
    public function functionCalledTwoTimesWithSpecificArguments()
    {
        $mock = $this->getMockBuilder(stdClass::class)
            ->setMethods(['set'])
            ->getMock();

        $mock->expects($this->exactly(2))
            ->method('set')
            ->withConsecutive(
                [$this->equalTo('foo'), $this->greaterThan(0)],
                [$this->equalTo('bar'), $this->greaterThan(0)]
            );
        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }
}
