<!DOCTYPE html>
<html>
<body>
<form method="post">
    Budget Name: <input type="text" name="name"><br><br>
    Month: <input type="date" name="month"><br><br>
    Monthly Income: <input type="number" name="income"><br><br>
    Food Expense: <input type="number" name="food"><br><br>
    Transport Expense: <input type="number" name="transpo"><br><br>
    Shopping Expense: <input type="number" name="shopping"><br><br>
    Savings Goal (%): <input type="range" name="goal" min="10" max="50"><br><br>
    <button type = "submit">Submit</button>
    <br><br>
</form>
    
<?php
    if ($_POST) {
        $name = $_POST['name'];
        $income = $_POST['income'];
        $food = $_POST['food'];
        $transpo = $_POST['transpo'];
        $shopping = $_POST['shopping'];
        $goal = $_POST['goal'];

        $total = $food + $transpo + $shopping;
        $target = $income * ($goal/100);
        $balance = $income - $total;

        $status = $balance >= $target ? "Goal Met" : "Short by ₱" . ($target - $balance);

        echo "
        <table border='1' cellpadding='8'>
        <tr><td>Budget Name</td><td>$name</td></tr>
        <tr><td>Monthly Income</td><td>$income</td></tr>
        <tr><td>Total Expenses</td><td>$total</td></tr>
        <tr><td>Savings Goal</td><td>$goal%</td></tr>
        <tr><td>Target Savings</td><td>$target</td></tr>
        <tr><td>Remaining Balance</td><td>$balance</td></tr>
        <tr><td>Savings Status</td><td>$status</td></tr>
        </table>";
    }
?>
</body>
<html>