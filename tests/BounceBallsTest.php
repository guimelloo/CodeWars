<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

use App\BounceBalls;

class BounceBallsTest extends TestCase
{    
    private function revTest($actual, $expected) 
    {
        $this->assertSame($expected, $actual);
    }

    public function test_basics() 
    {
        $bounceBall = new BounceBalls;
        $this->revTest($bounceBall->bouncingballs(10, 0.6, 10), -1);
    }
}
