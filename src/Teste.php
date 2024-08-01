<?php
class Teste
{ 
    function sortArray(){
        $array = [];
        $arr = [8,2,7,1,3,6,10,15,4,5];
        $oddNum = [];
        $evenNum = [];
        
        foreach($arr as $a) {
            if ($a % 2 == 0) {
                $evenNum[] = $a;
            }else {
                $oddNum[] = $a;
            }
        }

        for ($i=0; $i < count($evenNum); $i++) { 
            for ($j=0; $j < count($evenNum); $j++) { 
                if ($evenNum[$i] < $evenNum[$j]) {
                    
                    $x = $evenNum[$j];
                    $evenNum[$j] = $evenNum[$i];
                    $evenNum[$i] = $x;
                }
            } 
        }

        for ($i=0; $i < count($oddNum); $i++) { 
            for ($j=0; $j < count($oddNum); $j++) { 
                if ($oddNum[$i] < $oddNum[$j]) {
                    
                    $x = $oddNum[$j];
                    $oddNum[$j] = $oddNum[$i]; 
                    $oddNum[$i] = $x;
                }
            } 
        }

        foreach ($evenNum as $num) {
            $array[] = $num;
        }

        foreach ($oddNum as $num) {
            $array[] = $num;
        }
        var_dump($array);
    } 
}
$teste = new Teste;
$teste->sortArray();   