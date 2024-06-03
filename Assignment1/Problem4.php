<?php

$n = 10;
$columnPerLine = 2 * $n - 1; //2*5 -1 = 9

echo "<pre>";

for ($i = 1; $i <= $n; $i++) {
    $totalStarForThisRow = 2 * $i - 1; // 2*1 -1 = 1, 2*2 -1 =3, 2*3-1=5, 2*4-1=7, 2*5-1=9
    $spaces = $n - $i; //5 - 1, 5-2 = 3, 5-3 =2, 5-4=1, 5-5 = 0;

    for ($j = 1; $j <= $columnPerLine; $j++) {
        if ($j <= $spaces) {
            echo " ";
        } else if ($j >= $spaces) {
            while ($totalStarForThisRow != 0) {
                echo "*";
                $j++;
                $totalStarForThisRow--;
            }
        }
    }
    echo "<br>";
}

echo "</pre>";