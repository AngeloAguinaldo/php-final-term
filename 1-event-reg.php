<!DOCTYPE html>
<html>
<body>

<form method = "post">
    Full Name: <input type ="text" name="name"><br><br>
    Email: <input type ="email" name="email"><br><br>
    Contact Number: <input type="tel" name="contact"><br><br>
    Event Date: <input type="date" name="date"><br><br>
    Event Time: <input type="time" name="time"><br><br>
    Number of Attendees: <input type="number" name="attendees"><br><br>
    Ticket Type:
    <select name="ticket">
        <option value="Regular">Regular</option>
        <option value="VIP">VIP</option>
        <option value="Student">Student</option>
    </select><br><br>
    Gender:
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br><br>
    Add-ons:<br>
    <input type="checkbox" name="addons[]" value="50">Snack P50<br>
    <input type="checkbox" name="addons[]" value="150">T-shirt P150<br>
    <input type="checkbox" name="addons[]" value="300">Backstage Pass P300<br>
    <br>

    <button type="submit">Submit</button>
    <br><br>
</form> 

<?php
    if ($_POST) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $attendees = $_POST['attendees'];
        $ticket = $_POST['ticket'];
        $addons = $_POST['addons'] ?? [];
        $addons_names = [
            "50" => "Snack",
            "150" => "T-Shirt",
            "300" => "Backstage Pass"
        ];
         
        $addons_list = [];
        foreach ($addons as $a) {
            $addons_list[] = $addons_names[$a];
        }

        $addons_display = $addons_list ? implode(", ", $addons_list) : "None";

        if ($ticket == "Regular") $price = 300;
        if ($ticket == "VIP") $price = 600;
        if ($ticket == "Student") $price = 200;

        $subtotal = $price * $attendees;
        $discount = ($attendees >= 5) ? $subtotal * 0.10 : 0;
        $addons_total = array_sum($addons) * $attendees;
        $final = $subtotal - $discount + $addons_total;
        
        echo "
        <table border='1' cellpadding='8'>
        <tr><td>Full Name</td><td>$name</td></tr>
        <tr><td>Email</td><td>$email</td></tr>
        <tr><td>Number of Attendees</td><td>$attendees</td></tr>
        <tr><td>Ticket Type</td><td>$ticket</td></tr>
        <tr><td>Add-ons</td><td>$addons_display</td></tr>
        <tr><td>Subtotal</td><td>₱$subtotal</td></tr>
        <tr><td>Group Discount (10%)</td><td>₱$discount</td></tr>
        <tr><td>Add-ons Total</td><td>₱$addons_total</td></tr>
        <tr><td>Final Total</td><td>₱$final</td></tr>
        </table>";

    }
    ?>

</body>
</html>