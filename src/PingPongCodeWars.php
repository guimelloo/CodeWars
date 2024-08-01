<?php
namespace App;

class PingPongCodeWars
{
    public function run(string $rallie) 
    {
        $pingPoints = 0;
        $pongPoints = 0;
        $firstSurvey = null;
        $lastSurvey = null;
        $lastPlayed = null;
        $winner = null;
        $lastBadSound = null;

        $sounds = explode('-',  $rallie);
        $position = count($sounds);

        $firstSurvey = $sounds[0];
        
        dump($rallie);
        if ($sounds[$position - 1] === 'ping' || $sounds[$position - 1] === 'pong') {
            if ($sounds[$position - 1] === 'ping') {
                $winner = 'pong';
            } else {
                $winner = 'ping';
            }
            return $winner;
        }

        for ($i=0; $i < count($sounds); $i++) {  
            if ($lastPlayed === $sounds[$i]) {
                $lastPlayed = $sounds[$i];
                continue;
            }
            
            if ($sounds[$i] === 'ping' || $sounds[$i] === 'pong') {
                $lastPlayed = $sounds[$i];
            }
                     
            if ($sounds[$i] !== 'ping' && $sounds[$i] !== 'pong') {
                if ($lastPlayed === 'ping') {
                    $pongPoints++;
                    $lastBadSound = 'ping';
                    dump('pong ='. $pongPoints.'   -------------------------------');
                } else {
                    $pingPoints++;
                    $lastBadSound = 'pong';
                    dump('ping ='. $pingPoints.'   -------------------------------');
                }
            }
        }

        if ($pingPoints === $pongPoints) {
            if ($lastBadSound === 'ping') {
                $winner = 'pong';
            } else {
                $winner = 'ping';
            }
        }
        
        if ($pingPoints > $pongPoints) {
            $winner = 'ping';
        } elseif ($pingPoints < $pongPoints) {
            $winner = 'pong';
        }

        return $winner;
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

