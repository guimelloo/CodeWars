<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\PingPongCodeWars;

class PingPongCodeWarsTest extends TestCase
{
    public function testSample1() {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("ping", $pingPonng->run("ping-pong-ping-pong-bonk-bing-doof"));
      }

      public function testSample2() {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("pong", $pingPonng->run("pong-ping-dong-ping-pong-tink-bonk-pong-ping-doof"));
      }

      public function testSample3() {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("ping", $pingPonng->run("pong-ping-bink-ping-pong-donk"));
      }

      public function testSample4() {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("pong", $pingPonng->run("pong-ping-bink-pong-ping-donk-pong-ping-pong-bang"));
      }

      public function testSample5()
      {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("ping", $pingPonng->run("pong-ding-pong-ping-donk-ping-pong-thud"));
      }

      public function testSample6()
      {
        $pingPonng = new PingPongCodeWars;

        $this->assertSame("pong", $pingPonng->run("ping-pong-ding-pong-ping-donk-ping-thud"));
      }
}
