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
                // $this->Verificacao();
            }

        } while ($jogar == 's'); 
    }

    public function Verificacao ()
    {

        // $combinacoes = [[$tabuleiro[0], $tabuleiro[1], $tabuleiro[2]], 
        //                 [$tabuleiro[3], $tabuleiro[4], $tabuleiro[5]], 
        //                 [$tabuleiro[6], $tabuleiro[7], $tabuleiro[8]],
        //                 [$tabuleiro[0], $tabuleiro[4], $tabuleiro[8]],
        //                 [$tabuleiro[2], $tabuleiro[4], $tabuleiro[6]]];

        // $combinacoes = [[0, 1, 2], 
        //                 [3, 4, 5], 
        //                 [6, 7, 8],
        //                 [0, 4, 8],
        //                 [2, 4, 6]];

        // foreach($combinacoes as $combinacao => $index){
        //     if($combinacao == $posicoesX) {
        //         echo 'chegou';
        //     }
        // }

        // $vitoria = [
        //     0 => [[0,1,2], [0,4,8], [0,3,6]],
        //     1 => [ 
        // ];

        // $jogadorX = [];

        // foreach ($tabuleiro as $posicao => $jogador) {
        //     if ($jogador === 'X') {
        //         $jogadorX[] = $posicao;
        //     }
        // }

        // if ( $tabuleiro[0] === 'X' && $tabuleiro[1] === 'X' && $tabuleiro[2] === 'X' ||
        //        $tabuleiro[3] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[5] === 'X' ||
        //        $tabuleiro[6] === 'X' && $tabuleiro[7] === 'X' && $tabuleiro[8] === 'X' ||
        //        $tabuleiro[0] === 'X' && $tabuleiro[3] === 'X' && $tabuleiro[6] === 'X' ||
        //        $tabuleiro[1] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[7] === 'X' ||
        //        $tabuleiro[2] === 'X' && $tabuleiro[5] === 'X' && $tabuleiro[8] === 'X' ||
        //        $tabuleiro[0] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[8] === 'X' ||
        //        $tabuleiro[2] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[6] === 'X' ) {
                
        //         $winner = $nomeJogador1;
        //         echo "o vencedor foi o {$nomeJogador1}!!!!";
        //         $jogar = readline('gostaria de jogar novamente s/n:');
        //     }

        //     if ( $tabuleiro[0] === 'O' && $tabuleiro[1] === 'O' && $tabuleiro[2] === 'O' ||
        //     $tabuleiro[3] === 'O' &&$tabuleiro[4] === 'O' &&$tabuleiro[5] === 'O' ||
        //     $tabuleiro[6] === 'O' &&$tabuleiro[7] === 'O' &&$tabuleiro[8] === 'O' ||
        //     $tabuleiro[0] === 'O' &&$tabuleiro[3] === 'O' &&$tabuleiro[6] === 'O' ||
        //     $tabuleiro[1] === 'O' &&$tabuleiro[4] === 'O' &&$tabuleiro[7] === 'O' ||
        //     $tabuleiro[2] === 'O' &&$tabuleiro[5] === 'O' &&$tabuleiro[8] === 'O' ||
        //     $tabuleiro[0] === 'O' &&$tabuleiro[4] === 'O' &&$tabuleiro[8] === 'O' ||
        //     $tabuleiro[2] === 'O' &&$tabuleiro[4] === 'O' &&$tabuleiro[6] === 'O' ) {
             
        //      $winner = $nomeJogador2;
        //      echo "o vencedor foi o {$nomeJogador2}!!!!";
        //      $jogar = readline('gostaria de jogar novamente s/n:');
        //     }
    }
}

$jogo = new Base;
$jogo->jogo();
?>  