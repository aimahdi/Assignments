<?php
/**
 * Author: Amimul Ihsan
 */
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem1</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <?php

    $numbers = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $arrayInput = $_POST['numberInput'];

        $numbers = getNumberArrayFromString($arrayInput); //explode function can be used for array converstion
    
    } else {
        $numbers = [10, 12, 15, 189, 22, 2, 34];
    }



    echo "<b>Provided numbers are: </b>";

    printAllValuesFromAnArray($numbers); //implode function can be used for string converstion
    
    $minimumValue = findMinimumOfAbs($numbers);

    echo "<b>Minimum value of the given array is: </b>$minimumValue";

    function getNumberArrayFromString($stringInput): array
    {
        $tempNumber = 0;
        $inputLength = strlen($stringInput);
        $flag = false;

        for ($i = 0; $i < $inputLength; $i++) {
            $positionValues = $stringInput[$i];

            if ($positionValues == ' ') {
                if ($flag) {
                    $tempNumber *= -1;
                }
                $numbers[] = $tempNumber;
                $tempNumber = 0;

            } else if ($positionValues == '-') {
                $flag = true;
            } else {
                $tempNumber = $tempNumber * 10 + (int) $positionValues;
            }
        }

        $numbers[] = $tempNumber;

        return $numbers;
    }

    function printAllValuesFromAnArray($numbers)
    {
        $totalNumber = count($numbers);

        for ($i = 0; $i < $totalNumber; $i++) {
            echo $numbers[$i];
            if ($i < $totalNumber - 1) {
                echo ", ";
            } else {
                echo "<br>";
            }
        }
    }


    function findMinimumOfAbs($inputArray)
    {
        $minimum = $inputArray[0];

        foreach ($inputArray as $number) {
            if ($number < 0) {
                $number = $number * -1;
            }

            if ($minimum > $number) {
                $minimum = $number;
            }
        }

        return $minimum;
    }
    ?>
    <br><br><br>
    <form method="POST" action="">
        <label for="numberInput">Enter Numbers:</label>
        <input type="text" id="numberInput" name="numberInput" required>
        <input type="submit" value="Submit Data">
    </form>

</body>

</html>