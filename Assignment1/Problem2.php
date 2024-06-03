<?php
$fileData = file_get_contents('./string_input.txt');
$fileData = trim($fileData);

$words = explode(" ", $fileData);


$totalWords = count($words);

echo "<b>This is the paragraph:</b><br>";
highlight_string($fileData);

echo "<br>The paragraph contains <b>" . $totalWords . "</b> words";
