<?php
namespace App;

class IsANumberPrime
{
 public function is_prime(int $number) : bool
 {
    if ($number <= 1) {
        return false;
    }

    $divisores = null;

    for ($i=1; $i < $number; $i++) { 
        if ($number % $i == 0) {
            $divisores++;
        }
    }

    if ($divisores > 2) {
        return false;
    }

    return true;
 }   
}
