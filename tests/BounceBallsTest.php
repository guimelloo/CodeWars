<?php
use PHPUnit\Framework\TestCase;

use App\BounceBalls;

class BounceBallsTest extends TestCase
{    
    private function revTest($actual, $expected) 
    {
        $this->assertSame($expected, $actual);
    }

    public function testBasics() 
    {
        $bounceBall = new BounceBalls;
        $this->revTest($bounceBall->bouncingballs(3.0, 0.66, 1.5) , 3);
        $this->revTest($bounceBall->bouncingballs(30.0, 0.66, 1.5), 15);
        $this->revTest($bounceBall->bouncingballs(10, 0.6, 10), -1);
    }
}
