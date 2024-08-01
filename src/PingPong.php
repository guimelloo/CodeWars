<?php
namespace App;

class PingPong
{
    private int $pingPoints = 0;

    private int $pongPoints = 0;

    private string $firstSurvey;

    private string $lastSurvey;

    private ?string $lastPlayed = null;

    private string $lastBadSound;

    private string $winner;


    public function run(string $rallie) 
    {
        $sounds = explode('-',  $rallie);
        $position = count($sounds);

        $this->firstSurvey = $sounds[0];
        

        if (! $this->isBadSound($sounds[$position - 1])) {
            if ($sounds[$position - 1] === 'ping') {
                $this->winner = 'pong';
            } else {
                $this->winner = 'ping';
            }

            return;
        }

        for ($i=0; $i < count($sounds); $i++) {  
            if ($this->lastPlayed === $sounds[$i]) {
                $this->lastPlayed = $sounds[$i];
                continue;
            }
            
            if (! $this->isBadSound($sounds[$i])) {
                $this->lastPlayed = $sounds[$i];
            }

            if ($this->isBadSound($sounds[$i])) {
                if ($this->lastPlayed === 'ping') {
                    $this->pongPoints++;
                    $this->lastBadSound = 'ping';
                } else {
                    $this->pingPoints++;
                    $this->lastBadSound = 'pong';
                }
            }
        }
 
        if ($this->pingPoints === $this->pongPoints) {
            if ($this->lastBadSound === 'ping') {
                $this->winner = 'pong';
            } else {
                $this->winner = 'ping';
            }
        }
    }

    public function getPingPoints(): int
    {
        return $this->pingPoints;
    }

    public function getPongPoints(): int
    {
       return $this->pongPoints; 
    }

    public function getWinner(): string
    {
        return $this->winner;
    }

    private function isBadSound(string $sound): bool
    {
        return $sound !== 'ping' && $sound !== 'pong';
    }
    
}






// <?php
// namespace App;

// class PingPong
// {
//     function pingPong(string $rallie): string 
//     {
//         $sounds = explode('-',  $rallie);
        
        
//         $lastPlayed = null;
//         $badSound = null;
//         $winner = null;
//         $count = null;

//         $pingError = null;
//         $pongError = null;
        
//         $pong = 0;
//         $ping = 0;
        

//         for ($i=0; $i <= count($sounds); $i++) { 
            
//             if ($sounds[$i] != 'ping' && $sounds[$i] != 'pong') {
//                 $badSound = $sounds[$i];
//                 $count = $i - 1;
//                 $lastPlayed = $sounds[$count];
//             }

//             if ($sounds[$i] == "ping") { 
//                 $ping++;
//             }

//             if ($sounds[$i] == "pong") { 
//                 $pong++;
//             }

//             if ($lastPlayed == "ping") { 
//                 $pingError++;
//             }

//             if ($lastPlayed == "pong") { 
//                 $pongError++;
//             }

//             if (! isset($sounds[$i+1])) {

//                 $pong = $pong - $pongError;
//                 $ping = $ping - $pingError;

//                 if ($ping == 0 && $pong > 0 && $lastPlayed == "pong") {
//                     return "ping";
//                 }

//                 if ($pong == 0 && $ping > 0 && $lastPlayed == "ping") {
//                     return "ping";
//                 }

//                 // if ($ping > $pong && $lastPlayed == "ping") {
//                 //     return "pong";
//                 // }elseif ($ping < $pong && $lastPlayed == "pong") {
//                 //     return "ping";
//                 // }
                
//                 if ($ping > $pong) {
//                     return 'ping';
//                 }
        
//                 if ($ping < $pong) {
//                     return 'pong';
//                 }
            
//                 if ($ping == $pong && $lastPlayed == "ping") {
//                     return "pong";
//                 } else {
//                     return "ping";
//                 }

//             }
//         }
//     }
// }

