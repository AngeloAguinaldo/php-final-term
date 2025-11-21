<!DOCTYPE html>
<html>
<body>
<form method ="post">
Restaurant Name: <input type="text" name="name"><br><br>
Date: <input type="date" name="date"><br><br>
Number of people: <input type="number" name="qty"><br><br>
Food Total: <input type="number" name="food"><br><br>
Drinks Total: <input type="number" name="drinks"><br><br>
Has Senior Citizen?
<input type="checkbox" name="disc" value=20>Yes
<input type="checkbox" name="disc" value=0>No

<br><br><button type="submit">submit</button>
<?php
if ($_POST) {
 $name = $_POST['name'];
 $qty = $_POST['qty'];
 $food = $_POST['food'];
 $drinks = $_POST['drinks'];
 $disc = $_POST['disc'];
 
 $subtotal = $food + $drinks;
 $disc_total = $subtotal * ($disc / 100);
 $after_disc = $subtotal - $disc_total;
 $service_charge = $after_disc * 0.1;
 $total = $after_disc + $service_charge;
 $per_person = $total / $qty;

echo "
<table border = '1' cellpading = '8'>
<tr><td>Restaurant Name</td><td>$name</td></tr>
<tr><td>Number of People</td><td>$qty</td></tr>
<tr><td>Food + Drinks Subtotal</td><td>$subtotal</td></tr>
<tr><td>Senior Discount (20%)</td><td>$disc_total</td></tr>
<tr><td>After Discount</td><td>$after_disc</td></tr>
<tr><td>Service Charge (10%)</td><td>$service_charge</td></tr>
<tr><td>Total Bill</td><td>$total</td></tr>
<tr><td>Per Person</td><td>$per_person</td></tr>
";

}
?>

</body>
</html>