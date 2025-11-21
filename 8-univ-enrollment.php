<!DOCTYPE html>
<html>
    <body>
        <form method = "post">
        Student Name: <input type="text" name="name"><br><br>
        Student ID: <input type="text" name="id"><br><br>
        Program:
        <select name="program">
        <option value="1800">BS Computer Science</option><br><br>
        <option value="2000">BS Nursing</option><br><br>
        <option value="1600">BS Business</option><br><br>
        </select>

        <br><br>Year Level:<br><br>
        <input type="radio" name="year_level" value="5000">1st Year<br><br>
        <input type="radio" name="year_level" value="4500">2nd Year<br><br>
        <input type="radio" name="year_level" value="4000">3rd Year<br><br>
        <input type="radio" name="year_level" value="4000">4th Year<br><br>

        Number of Units: <input type="number" name="units"><br><br>

        Has Scholarship?
        <input type="checkbox" name="scholarship" value="0.2">Yes
        <input type="checkbox" name="scholarship" value="0">No<br><br>

        <button type="submit">Submit</button><br><br>
        </form>

        <?php
        if ($_POST) {
            $name = $_POST['name'];
            $id = $_POST['id'];
            $program = $_POST['program'];
            $year_level = $_POST['year_level'];
            $units = $_POST['units'];
            $scholarship = $_POST['scholarship'];

            $program_names = [
                "1800" => "BS Computer Science",
                "2000" => "BS Nursing",
                "1600" => "BS Business"
            ];
            $program_name = $program_names[$program];

            $year_level_names = [
                "5000" => "1st Year",
                "4500" => "2nd Year",
                "4000" => "3rd Year", "4th year",
            ];
            $year_level_name = $year_level_names[$year_level];

            $base_tuition = $program * $units;
            $scholarship_disc = $base_tuition * $scholarship;
            $after_scholarship = $base_tuition - $scholarship_disc;
            $total = $after_scholarship + $year_level;

            echo "
            <table border = '1' cellpadding='8'>
            <tr><td>Student Name</td><td>$name</td></tr>
            <tr><td>Student ID</td><td>$id</td></tr>
            <tr><td>Program</td><td>$program_name</td></tr>
            <tr><td>Year Level</td><td>$year_level_name</td></tr>
            <tr><td>Number of Units</td><td>$units units</td></tr>
            <tr><td>Base Tuition</td><td>$base_tuition</td></tr>
            <tr><td>Scholarship Discount</td><td>$scholarship_disc</td></tr>
            <tr><td>After Scholarship</td><td>$after_scholarship</td></tr>
            <tr><td>Miscellaneous Fees</td><td>$year_level</td></tr>
            <tr><td>Total Enrollment Fee</td><td>$total</td></tr>
            ";

        }


        ?>





    </body>
</html>