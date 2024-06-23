<?php

class Transactions
{
    public function addIncome($title, $amount, $type, $category)
    {
        file_put_contents("information.csv", "\n$title, $amount, $type, $category", FILE_APPEND);
    }

    public function addExpense($title, $amount, $type, $category)
    {
        file_put_contents("information.csv", "\n$title, $amount, $type, $category", FILE_APPEND);
    }
    public function getAllIncome()
    {

        $fileData = file_get_contents("information.csv");
        $transactions = explode("\n", $fileData);

        array_shift($transactions);
        echo "================================================================================\n";
        foreach ($transactions as $transactionString) {
            $transactionArray = explode(",", $transactionString);
            if (trim($transactionArray[2]) == 'income') {

                echo "Title: " . $transactionArray[0] . ", Amount: " . $transactionArray[1] . ", Category: " . $transactionArray[3] . "\n";
            }
        }

        echo "================================================================================\n\n\n";
    }

    public function getAllExpense()
    {
        $fileData = file_get_contents("information.csv");
        $transactions = explode("\n", $fileData);
        array_shift($transactions);
        $expenseList = [];
        echo "================================================================================\n";
        foreach ($transactions as $transactionString) {
            $transactionArray = explode(",", $transactionString);

            if (trim($transactionArray[2]) == 'expense') {
                $expenseList[] = $transactionArray;
                echo "Title: " . $transactionArray[0] . ", Amount: " . $transactionArray[1] . ", Category: " . $transactionArray[3] . "\n";
            }
        }
        echo "================================================================================\n\n\n";
    }

    public function viewSavings()
    {
        $fileData = file_get_contents("information.csv");
        $transactions = explode("\n", $fileData);
        array_shift($transactions);
        $savings = 0;
        foreach ($transactions as $transactionString) {
            $transactionArray = explode(",", $transactionString);

            if (trim($transactionArray[2]) == 'expense') {
                $savings -= trim($transactionArray[1]);
                continue;
            }
            $savings += trim($transactionArray[1]);
        }

        echo "================================================================================\n";
        echo "Amount: " . $savings . "\n";
        echo "================================================================================\n\n\n";

    }

    public function getAllCategories()
    {
        $fileData = file_get_contents("information.csv");
        $transactions = explode("\n", $fileData);
        array_shift($transactions);
        $expenseList = [];
        $trackerArray = [];
        echo "================================================================================\n";

        foreach ($transactions as $transactionString) {
            $transactionArray = explode(", ", $transactionString);

            if (!in_array($transactionArray[3], $trackerArray)) {
                $expenseList[] = $transactionArray;
                $trackerArray[] = $transactionArray[3];

                echo "Name: " . $transactionArray[3] . ", Type: " . $transactionArray[2] . "\n";
            } else if (in_array($transactionArray[3], $trackerArray) && $expenseList[array_search($transactionArray[3], $trackerArray)][2] != $transactionArray[2]) {
                $expenseList[] = $transactionArray;
                $trackerArray[] = $transactionArray[3];

                echo "Name: " . $transactionArray[3] . ", Type: " . $transactionArray[2] . "\n";
            }



        }

        echo "================================================================================\n\n\n";
    }
}