<?php
use PHPUnit\Framework\TestCase;

class SkipTest extends TestCase
{
    protected function setUp()
    {
        if(!extension_loaded('mysqli'))
        {
            $this->markTestSkipped(
                'This MYSQLi extension is not available'
            );
        }
        
    }

    public function testConnection()
    {
    }
}
