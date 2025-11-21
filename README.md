<!DOCTYPE html>
<html>
<body>
<form method ="post">
Restaurant Name: <input type="text" name="name">
Date: <input type="date" name="date">
Number of people: <input type="number" name="qty">
Food Total: <input type="number" name="food">
Drinks Total: <input type="number" name="drinks">
Has Senior Citizen?
<input type="checkbox" name="disc" value=20>Yes
<input type="checkbox" name="disc" value=0>No

<?php
if ($_POST) {
 $name = $_POST['name'];
 $qty = $_POST['qty'];
 $food = $_POST['food'];
 $drinks = $_POST['drinks'];
 $disc = $_POST['disc'];
 
 $subtotal = $food + $drinks;
 $disc_total = $subtotal * ($disc ÷ 100);
 $after_disc = $subtotal - $disc_total;
 $service_charge = $after_disc * 0.1;
 $total = $after_disc + $service_charge;
 $per_person = $total / $qty;
}
?>

</body>
</html>
