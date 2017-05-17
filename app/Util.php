<?php
/**
 * Created by PhpStorm.
 * User: emmanuelhcpk
 * Date: 16/05/17
 * Time: 9:37 AM
 */

namespace App;


class Util
{
    static function levenshtein($s,$t) { // algoritmo de las distancia de levenshtein
        $m = strlen($s);
        $n = strlen($t);

        for($i=0;$i<=$m;$i++) $d[$i][0] = $i;
        for($j=0;$j<=$n;$j++) $d[0][$j] = $j;

        for($i=1;$i<=$m;$i++) {
            for($j=1;$j<=$n;$j++) {
                $c = ($s[$i-1] == $t[$j-1])?0:1;
                $d[$i][$j] = min($d[$i-1][$j]+1,$d[$i][$j-1]+1,$d[$i-1][$j-1]+$c);
            }
        }

        return $d[$m][$n];
    }


}