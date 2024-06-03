<?php

$input = 62343;

$temp = $input;

$sum = 0;

while ($temp != 0) {
    $sum += $temp % 10;
    $temp = (int) ($temp / 10);
}

echo $sum;