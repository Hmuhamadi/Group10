<?php
$expenses = array(200, 150, 50, 400, 100); 

$totalAmount = 0;
$amountOfExpenses = count($expenses);

foreach ($expenses as $expense) {
    $totalAmount += $expense;
}

echo "My $amountOfExpenses bigger expenses were $totalAmount";
?>
