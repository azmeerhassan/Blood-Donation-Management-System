<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donor</title>
    <style>
    .success {
        color: green;
        font-weight: bold;
        padding: 8px;
        border: 1px solid green;
        background-color: #e6ffe6;
        border-radius: 5px;
    }
    .error {
        color: red;
        font-weight: bold;
        padding: 8px;
        border: 1px solid red;
        background-color: #ffe6e6;
        border-radius: 5px;
    }
</style>

</head>
<body>
    <form method="POST" action="">
        <label>Select Blood Group:</label>
        <select name="blood_group">
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>O+</option>
            <option>O-</option>
            <option>AB+</option>
            <option>AB-</option>
        </select>
        <br><br>

        <label>Enter City:</label>
        <input type="text" name="city" placeholder="Enter City">
        <br><br>

        <input type="submit" value="Search">
    </form>

    <br><br>
    <a href="index.php">Back to Home Page</a>

<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($db_connect_error)) {
        echo "<p class='error' style='color: red; font-weight: bold;'>❌ Database connection failed: "
             . htmlspecialchars($db_connect_error) . "</p>";
    } else {
        $blood_group = $_POST['blood_group'];
        $city = trim($_POST['city']);

        if ($city == '') {
            $query = "SELECT * FROM donors WHERE blood_group = '$blood_group'";
        } else {
            $city = mysqli_real_escape_string($conn, $city);
            $query = "SELECT * FROM donors WHERE blood_group = '$blood_group' AND city LIKE '%$city%'";
        }

        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "<p class='success' style='color: red; font-weight: bold;'>❌ Error running search query.</p>";
        } elseif (mysqli_num_rows($result) > 0) {
            echo "<h2>Available Donors:</h2>";
            echo "<table border='1' cellpadding='8' cellspacing='0'>";
            echo "<tr><th>Name</th><th>Blood Group</th><th>Contact</th><th>City</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $name        = htmlspecialchars($row['name']);
                $blood_group = htmlspecialchars($row['blood_group']);
                $contact     = htmlspecialchars($row['contact']);
                $city        = htmlspecialchars($row['city']);

                echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$blood_group}</td>";
                echo "<td>{$contact}</td>";
                echo "<td>{$city}</td>";
                echo "</tr>";   // <- missing in your code
            }

            echo "</table>";
        } else {
            $safe_blood_group = htmlspecialchars($blood_group);
            $safe_city = htmlspecialchars($city);
            echo "<p class='success' style='color: red; font-weight: bold;'>❌ No donors found for $safe_blood_group in $safe_city.</p>";
        }

        mysqli_free_result($result);
        mysqli_close($conn);
    }
}
?>
</body>
</html>
