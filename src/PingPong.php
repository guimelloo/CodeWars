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