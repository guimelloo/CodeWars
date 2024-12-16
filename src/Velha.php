<?php

class Base
{  
    public function Jogo()
    {
        do {
            $nomeJogador1 = readline('digite o nome do jogador 1 (X):');
            $nomeJogador2 = readline('digite o nome do jogador 2 (O):');

            $tabuleiro = [
                '.', '.', '.',
                '.', '.', '.', 
                '.', '.', '.'
                ];

            $jogador = 'X';
            $jogar = 's';
            $winner = null;

            while ($winner === null) {
                echo <<<EOL
                    Posicoes | tabuleiro
                    0|1|2      $tabuleiro[0]|$tabuleiro[1]|$tabuleiro[2] 
                    3|4|5      $tabuleiro[3]|$tabuleiro[4]|$tabuleiro[5]
                    6|7|8      $tabuleiro[6]|$tabuleiro[7]|$tabuleiro[8]
                    
                    EOL;
                
                $posicao = (int) readline('qual posicao do tabuleiro voce gostaria de jogar:');
    
                $tabuleiro[$posicao] = $jogador;
    
                if($tabuleiro[$posicao] == 'X') {
                    $posicoesX[] = $posicao;
                    var_dump($posicoesX);
                }
                
                if($tabuleiro[$posicao] == 'O') {
                    $posicoesO[] = $posicao;
                    var_dump($posicoesO);
                }
                
                if($jogador == 'X') {
                    $jogador = 'O';
                } else {
                    $jogador = 'X';
                }

                $combinacoes = [[0, 1, 2], 
                                [3, 4, 5], 
                                [6, 7, 8],
                                [0, 3, 6],
                                [1, 4, 7],
                                [2, 5, 8],
                                [0, 4, 8],
                                [2, 4, 6]];

            foreach($combinacoes as $combinacao){
                echo 'looping funcionando';
                if(in_array($posicoesX, $combinacao)) {
                    echo 'chegou';
                }
            }
            }

        } while ($jogar == 's'); 
    }
}

$jogo = new Base;
$jogo->jogo();
