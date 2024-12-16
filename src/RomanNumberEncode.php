<?php

namespace App;

class RomanNumberEncode
{ 
    public function transform(int $number): string
    {
        $numberAsString = str_split((string) $number);

        $count = count($numberAsString) - 1;

        $position = 1;

        $total = 0;

        $roman = '';

        for ($i = $count; $i >= 0; $i--) {

            $x = (int) $numberAsString[$i];

            $code = $this->encode($x);

            $roman =  $this->decode($code, $position) . $roman;

            $position++;
        }
        
        return $roman;
    }

    private function encode(int $number): ?string
    {
        return match ($number) {
            0 => '1',
            1 => '1',
            2 => '1,1',
            3 => '1,1,1',
            4 => '1,2',
            5 => '2',
            6 => '2,1',
            7 => '2,1,1',
            8 => '2,1,1,1',
            9 => '1,3',
            default => '',
        };
    }

    private function decode(string $code, int $position) : string
    {
        
        $roman = match ($code) {
            '1' => ['I', 'X', 'C', 'M'],
            '1,1' => ['II', 'XX', 'CC'],
            '1,1,1' => ['III', 'XXX', 'CCC'],
            '1,2' => ['IV', 'XL', 'CD'],
            '2' => ['V', 'L', 'D'],
            '2,1' => ['VI', 'LX', 'DC'],
            '2,1,1' => ['VII', 'LXX', 'DCC'],
            '2,1,1,1' => ['VIII', 'LXXX', 'DCCC'],
            '1,3' => ['IX', 'XC', 'CM'],
            default => [],
        };

        return $roman[$position - 1] ?? 'ERROR';
    }
}    
