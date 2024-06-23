<?php

require_once "./transactions.php";

$transactions = new Transactions();


while (true) {
    echo "1. Add income\n";
    echo "2. Add expense\n";
    echo "3. View incomes\n";
    echo "4. View expenses\n";
    echo "5. View savings\n";
    echo "6. View Categories\n";
    echo "7. Exit\n";

    $option = (int) readline("Enter your option: ");

    if ($option === 7) {
        break;
    } else if ($option === 1) {
        $amount = (double) readline("Enter the amount: ");
        $title = readline("Enter title: ");
        $type = 'income';
        $category = readline("Enter category: ");

        $transactions->addIncome($title, $amount, $type, $category);
    } else if ($option === 2) {
        $amount = (double) readline("Enter the amount: ");
        $title = readline("Enter title: ");
        $type = 'expense';
        $category = readline("Enter category: ");
        $transactions->addExpense($title, $amount, $type, $category);
    } else if ($option === 3) {
        $incomeList = $transactions->getAllIncome();

    } else if ($option === 4) {
        $expenseList = $transactions->getAllExpense();

    } else if ($option === 5) {
        //TODO: implement view savings
        $transactions->viewSavings();
    } else if ($option === 6) {
        //TODO: implement View categories
        $transactions->getAllCategories();
    }
}