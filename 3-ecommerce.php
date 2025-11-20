<!DOCTYPE html>
<html>
<body>
    <form method = "post">
        Customer Name: <input type="text" name="name"><br><br>
        Item:
        <select name="item">
            <option value="120">Mug</option>
            <option value="250">Shirt</option>
            <option value="450">Hoodie</option>
            <option value="180">Water Bottle</option>
        </select><br><br>
        Quantity: <input type="number" name="qty"><br><br>
        Item Color: <input type="color" name="color"><br><br>
        Shipping Region:<br>
        <input type ="radio" name="region" value="50">Metro Manila<br>
        <input type ="radio" name="region" value="100">Luzon<br>
        <input type ="radio" name="region" value="150">Visayas<br>
        <input type ="radio" name="region" value="200">Mindanao<br><br>
        Add-ons:<br>
        <input type="checkbox" name="addons[]" value="25">Gift Wrap<br>
        <input type="checkbox" name="addons[]" value="100">Express Delivery<br>
        <input type="checkbox" name="addons[]" value="50">Insurance<br>

        <br><button type="submit">Submit</button>
    </form>

    <?php
    if ($_POST) {
        $name = $_POST['name'];
        $price = $_POST['item'];
        $qty = $_POST['qty'];
        $region = $_POST['region'];
        $addons = $_POST['addons'] ?? [];

        $item_names = [
            "120" => "Mug",
            "250" => "Shirt",
            "450" => "Hoodie",
            "180" => "Water Bottle"
        ];
        $item_name = $item_names[$price];

        $region_names = [
            "50" => "Metro Manila",
            "100" => "Luzon",
            "150" => "Visayas",
            "200" => "Mindanao"
        ];
        $region_name = $region_names[$region];

        $addons_names = [
            "25" => "Gift Wrap",
            "100" => "Express Delivery",
            "50" => "Insurance"
        ];
        $addons_list = [];

        foreach ($addons as $a) {
            $addons_list[] = $addons_names[$a];
        }
        $addons_display = $addons_list ? implode(", ", $addons_list) : "None";
        
        $subtotal = $price * $qty;
        $addons_total = array_sum($addons);
        $total = $subtotal + $region + $addons_total;

        echo "
        <table border = '1' cellpadding = '8'>
        <tr><td>Customer Name</td><td>$name</td></tr>
        <tr><td>Item</td><td>$item_name</td></tr>
        <tr><td>Quantity</td><td>$qty</td></tr>
        <tr><td>Shipping Region</td><td>$region_name</td></tr>
        <tr><td>Add-ons</td><td>$addons_display</td></tr>
        <tr><td>Item Subtotal</td><td>$subtotal</td></tr>
        <tr><td>Shipping Cost</td><td>$region</td></tr>
        <tr><td>Add-ons Total</td><td>$addons_total</td></tr>
        <tr><td>Final Total</td><td>$total</td></tr>
        </table>";

    }

    ?>
</body>
</html>