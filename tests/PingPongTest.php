<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use App\PingPong;

class PingPongTest extends TestCase
{
  private PingPong $pingPong;

  public function setUp(): void
  {
    $this->pingPong = new PingPong;
  }
  

  public static function checkPoints()
  {
    yield ['ping-pong-doof', 1, 0];
    yield ['ping-pong-doof-ping-pong-daff', 2, 0];
    yield ['ping-pong-doof-ping-pong-daff-pong-ping-bang', 2, 1];
    yield ['ping-pong-doof-ping-pong-daff-pong-ping-bang-pong-ping-pong-ping-boom', 2, 2];  
  }

  #[DataProvider('checkPoints')]
  public function test_check_points(string $rally, int $pingPoints, int $pongPoints)
  {
    $this->pingPong->run($rally);

    $this->assertSame($pingPoints, $this->pingPong->getPingPoints());

    $this->assertSame($pongPoints, $this->pingPong->getPongPoints());
  }


  public static function checkWinnerScoreEven()
  {
    yield ['pong-ping-doof-ping-pong-daff', 'ping'];
    yield ['ping-pong-doof-ping-pong-daff-pong-ping-bang-pong-ping-pong-ping-boom', 'pong'];  
  }


  #[DataProvider('checkWinnerScoreEven')]
  public function test_score_is_even_the_winner_is_who_not_did_the_last_bad_sound(string $rally, string $winner)
  {
    $this->pingPong->run($rally);

    $this->assertSame($winner, $this->pingPong->getWinner());
  }



  public static function checkWinnerDoublePlay()
  {
    yield ['pong-ping-doof-ping-ping-daff', 2, 0];
    yield ['pong-pong-doof-ping-pong-ping-pong-daaf', 0, 2];  

  }


  #[DataProvider('checkWinnerDoublePlay')]

  public function test_the_winner_is_who_not_did_the_double_play(string $rally, int $pong, int $ping)
  {
    $this->pingPong->run($rally);

    $this->assertSame($ping, $this->pingPong->getPingPoints());

    $this->assertSame($pong, $this->pingPong->getPongPoints());
  }

  public static function checkTheGameIsNotEndedWithPingOrPong()
  {
    yield ['pong-ping-doof-ping-pong-ping', 'pong'];
    yield ['pong-ping-doof-ping-pong-daff-pong-ping-bang-pong-ping-pong', 'ping'];  
  }


  #[DataProvider('checkTheGameIsNotEndedWithPingOrPong')]

  public function test_the_game_is_not_ended_with_ping_or_pong(string $rally, string $winner)
  {
    $this->pingPong->run($rally);

    $this->assertSame($winner, $this->pingPong->getWinner());
  }
    // public function testSample1() {
    //     $pingPonng = new PingPong;

    //     $this->assertSame("ping", $pingPonng->pingPong("ping-pong-ping-pong-bonk-bing-doof"));
    //   }
    //   public function testSample2() {
    //     $pingPonng = new PingPong;

    //     $this->assertSame("pong", $pingPonng->pingPong("pong-ping-dong-ping-pong-tink-bonk-pong-ping-doof"));
    //   }
    //   public function testSample3() {
    //     $pingPonng = new PingPong;

    //     $this->assertSame("ping", $pingPonng->pingPong("pong-ping-bink-ping-pong-donk"));
    //   }
    //   public function testSample4() {
    //     $pingPonng = new PingPong;

    //     $this->assertSame("pong", $pingPonng->pingPong("pong-ping-bink-pong-ping-donk-pong-ping-pong-bang"));
    //   }

      // public function testSample5()
      // {
      //   $pingPonng = new PingPong;

      //   $this->assertSame("ping", $pingPonng->pingPong("pong-ding-pong-ping-donk-ping-pong-thud"));
      // }

      // public function testSample6()
      // {
      //   $pingPonng = new PingPong;

      //   $this->assertSame("pong", $pingPonng->pingPong("ping-pong-ding-pong-ping-donk-ping-thud"));
      // }
}
