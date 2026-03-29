<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("unauthorizes access");
}
include 'includes/db.php';
include 'class/expenses.php';
include 'core/session_handling.php';

// $expenseObj = new Expenses();
// $expenses = $expenseObj->getExpensesByUser($_SESSION['user_id']);
