<?php
use PHPUnit\Framework\TestCase;

use App\IsANumberPrime;

class IsANumberPrimeTest extends TestCase
{    
    public function test_number_is_prime() {

        $isPrime = new IsANumberPrime;

        $this->assertFalse($isPrime->is_prime(0));
        $this->assertFalse($isPrime->is_prime(1));
        $this->assertTrue($isPrime->is_prime(2));
        $this->assertTrue($isPrime->is_prime(5), 'Your function should work for the example provided in the Kata Description');
      }
}
