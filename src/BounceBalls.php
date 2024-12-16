<?php
namespace App;

class BounceBalls
{
    public function bouncingballs ($h, $bounce, $window)
    {
        $seenball = 1;
        $actualHeight = null;

        if ($h <= 0) {
            return -1;
        }

        if ($bounce <= 0 && $bounce >= 1) {
            return -1;
        }

        if ($window > $h) {
            return -1; 
        }

        $actualHeight = $h * $bounce;

        if ($actualHeight < $window) {
            return -1;
        }

        while ($actualHeight >= $window) {
            $seenball++;
            $actualHeight = $actualHeight * $bounce; 
        }

        return $seenball;
    }
}
