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

                } else {
                    $pingPoints++;
                    $lastBadSound = 'pong';

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
