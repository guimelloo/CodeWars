<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\RomanNumberEncode;

class RomanNumberEncodeTest extends TestCase
{  
    public function test_static_operations()
    {
        $roman = new RomanNumberEncode;

        $this->assertSame("IV", $roman->transform(4));
        $this->assertSame("I", $roman->transform(1));
    }
}