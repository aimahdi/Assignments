<?php

$sentence = 'I love programming';

$words = explode(' ', $sentence);

$sentenceLength = count($words);

for ($i = 0; $i < $sentenceLength; $i++) {
    echo reverseWord($words[$i]);
    if ($i == $sentenceLength - 1) {
        echo "<br>";
    } else {
        echo " ";
    }
}

function reverseWord($word)
{
    $wordLength = strlen($word);

    $reversedString = '';

    for ($i = $wordLength - 1; $i >= 0; $i--) {
        $reversedString .= $word[$i];
    }

    return $reversedString;
}