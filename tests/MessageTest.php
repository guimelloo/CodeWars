<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Message;

class MessageTest extends TestCase 
{
    public function test_sample_bla() 
    { 
        $message = new Message;

        $this->assertSame("#3#33", $message->run("De"));
        $this->assertSame("#4433999", $message->run("HEY"));
        $this->assertSame("666 6633089666084477733 33", $message->run("one two three"));
        $this->assertSame("#44#33555 5556660#9#66677755531111", $message->run("Hello World!"));
        $this->assertSame("#3#33 3330#222#666 6601-1111", $message->run("Def Con 1!"));
        $this->assertSame("#2**#9999", $message->run("A-z"));
        $this->assertSame("1-9-8-4-", $message->run("1984"));
        $this->assertSame("#22#444 4084426655777703336667770222443322255444664066688 806999055282", $message->run("Big thanks for checking out my kata"));
    }
  }