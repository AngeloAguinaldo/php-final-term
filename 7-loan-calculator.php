<!DOCTYPE html>
<html>
<body>
    <form method="post">
    Borrower Name: <input type="text" name="name"><br><br>
    Loan Amount: <input type="number" name="loan_amt"><br><br>
    Annual Interest: <input type="number" name="interest"><br><br>
    Loan Term (Months): <input type="number" name="loan_term"><br><br>
    Has Processing Fee?
    <input type="checkbox" name="fee" value="2">Yes
    <input type="checkbox" name="fee" value="0">No

    <br><br><button type="submit">Submit</button><br>
    </form>

    <?php
    if ($_POST) {
        $name = $_POST['name'];
        $loan_amt = $_POST['loan_amt'];
        $interest = $_POST['interest'];
        $loan_term = $_POST['loan_term'];
        $fee = $_POST['fee'];

        $fee_total = $fee / 100;
        $fee_rate = $loan_amt * 0.02;

        $monthly_interest_rate = $interest / 12;
        $total_interest = ($loan_amt * ($monthly_interest_rate / 100)) * $loan_term;
        $total = $loan_amt + $total_interest + $fee_rate;      
        $monthly_payment = $total / $loan_term;

    echo "
    <table border = '1' cellpading = '8'>
    <tr><td>Borrower Name</td><td>$name</td></tr>
    <tr><td>Loan Amount</td><td>$loan_amt</td></tr>
    <tr><td>Interest Rate</td><td>$interest per year</td></tr>
    <tr><td>Loan Term</td><td>$loan_term</td></tr>
    <tr><td>Total Interest</td><td>$total_interest</td></tr>
    <tr><td>Processing Fee (2%)</td><td>$fee_rate</td></tr>
    <tr><td>Total Amount to Pay</td><td>$total</td></tr>
    <tr><td>Monthly Payment</td><td>$monthly_payment</td></tr>
    ";
    }
    ?>

</body>
</html>