<?php declare(strict_types=1);

namespace App;

class MessageDraw
{
    public function run(string $message) 
    {
        $message = str_split($message);

        $phrase = null;

        foreach($message as $key => $currentLetter) {
            $nextLetter = $message[$key + 1] ?? null;
            $lastLetter = $message[$key - 1] ?? null;

            $currentLetterNumber = $this->matchNumber($currentLetter);

            $nextLetterNumber = $this->matchNumber($nextLetter);

            $match = match (true) {
                $this->isUpperCase($currentLetter) && is_null($lastLetter),
                $this->isUpperCase($lastLetter) && ! is_null($nextLetter) && $this->isLowerCase($nextLetter),
                $this->isLowerCase($currentLetter) && $this->isUpperCase($lastLetter),
                $this->isUpperCase($currentLetter) && ! is_null($lastLetter) && $this->isLowerCase($lastLetter),
                 
                
                => function () use ($currentLetter, $lastLetter, $nextLetter) {
                    $a = $this->isSpecial($currentLetter) && !$this->isSpecial($nextLetter);
                    
                    if ($a) {
                        return $this->parseToNumber($currentLetter);
                    }

                    return '#' . $this->parseToNumber($currentLetter); 
                },
                default => fn () => $this->parseToNumber($currentLetter)
            };
        
            $phrase .= $match();

            if ($currentLetterNumber === $nextLetterNumber && $this->isUpperCase($currentLetter) === $this->isUpperCase($nextLetter)) {
                $phrase .= ' ';
            }
        }

        return $phrase;
    }

    private function parseToNumber(?string $msg)
    {    
        return match (strtolower($msg ?? '')) {
            "a" => "2",
            "b" => "22",
            "c" => "222",
            "d" => "3",
            "e" => "33",
            "f" => "333",
            "g" => "4",
            "h" => "44",
            "i" => "444",
            "j" => "5",
            "k" => "55",
            "l" => "555",
            "m" => "6",
            "n" => "66",
            "o" => "666",
            "p" => "7",
            "q" => "77",
            "r" => "777",
            "s" => "7777",
            "t" => "8",
            "u" => "88",
            "v" => "888",
            "w" => "9",
            "x" => "99",
            "y" => "999",
            "z" => "9999",
            " " => "0",
            "." => "1",
            "," => "11",
            "?" => "111",
            "!" => "1111",
            "'" => "*",
            "-" => "**",
            "+" => "***",
            "=" => "****",
            "1" => "1-",
            "2" => "2-",
            "3" => "3-",
            "4" => "4-",
            "5" => "5-",
            "6" => "6-",
            "7" => "7-",
            "8" => "8-",
            "9" => "9-",
            default => null
        };
    } 

    private function isUpperCase(?string $letter)
    {
        return $letter ? ctype_upper($letter) : false;
    }

    private function isLowerCase(?string $letter)
    {
        return ! $this->isUpperCase($letter);
    }

    private function matchNumber(?string $letter)
    {
        return match (strtolower($letter ?? '')) {
            "a" => "2",
            "b" => "2",
            "c" => "2",
            "d" => "3",
            "e" => "3",
            "f" => "3",
            "g" => "4",
            "h" => "4",
            "i" => "4",
            "j" => "5",
            "k" => "5",
            "l" => "5",
            "m" => "6",
            "n" => "6",
            "o" => "6",
            "p" => "7",
            "q" => "7",
            "r" => "7",
            "s" => "7",
            "t" => "8",
            "u" => "8",
            "v" => "8",
            "w" => "9",
            "x" => "9",
            "y" => "9",
            "z" => "9",
            " " => " ",
            "." => "1",
            "," => "11",
            "?" => "111",
            "!" => "1111",
            default => null,
        };
    }
    
    private function isLetter(?string $char): bool
    {
        if (is_null($char)) {
            return false;
        }

        return str_contains('abcdefghijklmnopqrstuvwxyz', strtolower($char));
    }

    private function isSpecial(?string $char): bool
    {
        return ! $this->isLetter($char);
    }
} 
