<?php

use PHPUnit\Framework\TestCase;

use App\RomanNumberEncode;

class RomanNumberEncodeTest extends TestCase
{    
    public function test_a()
    {
        $roman = new RomanNumberEncode;

        $this->assertEquals('M', $roman->transform(1000)); 
    }

    public function test_static_operations()
    {
        $roman = new RomanNumberEncode;

        $this->assertSame("M", $roman->transform(1000));
        $this->assertSame("IV", $roman->transform(4));
        $this->assertSame("I", $roman->transform(1));
        $this->assertSame("MCMXC", $roman->transform(1990));
        $this->assertSame("MMVIII", $roman->transform(2008));
    }
}
