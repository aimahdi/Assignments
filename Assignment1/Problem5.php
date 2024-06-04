<?php

$input = -100020;

$temp = $input < 0 ? $input * -1 : $input;

$sum = 0;

while ($temp != 0) {
    $sum += $temp % 10;
    $temp = (int) ($temp / 10);
}

echo $sum;