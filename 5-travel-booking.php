<!DOCTYPE html>
<html>
<body>
    <form method = "post">
        Traveler Name: <input type="text" name="name"><br><br>
        Destination:
        <select name="destination">
            <option value="3500">Boracay</option>
            <option value="4000">Palawan</option>
            <option value="3000">Cebu</option>
            <option value="2500">Baguio</option>
        </select><br><br>
        Number of Travelers: <input type="number" name="qty"><br><br>
        Number of Days: <input type="number" name="days"><br><br>
        Departure Date: <input type="date" name="date"><br><br>
        Add-ons:<br>
        <input type="checkbox" name="addons[]" value="2000">Hotel + 2,000 /night<br>
        <input type="checkbox" name="addons[]" value="300">Breakfast + 300 / day<br>
        <input type="checkbox" name="addons[]" value="800">Tour Guide + 800 / day<br>
        
        <br><button type="submit">Submit</button>
    </form>

    <?php
    if ($_POST) {
        $name = $_POST['name'];
        $destination = $_POST['destination'];
        $qty = $_POST['qty'];
        $days = $_POST['days'];
        $addons = $_POST['addons'] ?? [];
        $addons_name = [
            "2000" => "Hotel",
            "300" => "Breakfast",
            "800" => "Tour Guide"
        ];

        $addons_list = [];
        foreach ($addons as $a) {
            $addons_list[] = $addons_name[$a];
        }

        $addons_display = $addons_list ? implode (", ", $addons_list) : "None";

        $destination_names = [
            "3500" => "Boracay",
            "4000" => "Palawan",
            "3000" => "Cebu",
            "2500" => "Baguio"
        ];
        $destination_name = $destination_names[$destination];

        $subtotal = ($destination * $days) * $qty;
        $addons_total = array_sum($addons) * $days * $qty;
        $total = $subtotal + $addons_total;

        echo "
        <table border='1' cellpadding='8'>
        <tr><td>Traveler Name</td><td>$name</td></tr>
        <tr><td>Destination</td><td>$destination_name</td></tr>
        <tr><td>Number of Travelers</td><td>$qty</td></tr>
        <tr><td>Number of Days</td><td>$days days</td></tr>
        <tr><td>Add-ons Selected</td><td>$addons_display</td></tr>
        <tr><td>Base Travel Cost</td><td>$subtotal</td></tr>
        <tr><td>Add-ons Total</td><td>$addons_total</td></tr>
        <tr><td>Final Total</td><td>$total</td></tr>
        </table>";
    }
    ?>
</body>
</html>