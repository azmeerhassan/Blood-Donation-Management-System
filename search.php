<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donor</title>
</head>
<body>
    <form method = 'POST' action = ''>
        <label>Select Blood Group:</label>
        <select name = 'blood_group'>
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>O+</option>
            <option>O-</option>
            <option>AB+</option>
            <option>AB-</option>

        </select>

        <input type="Submit" value = "Search">
</form>
<?php
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD']==="POST"){
    $blood_group = $_POST['blood_group'];

    $query = "SELECT * from donors WHERE blood_group = '$blood_group'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        echo "<h2>Availiable Donors:</h2>";
        echo "<table border = '1' cellpadding = '8' cellspacing = '0'>";
        echo "<tr><th>Name</th><th>Blood Group</th><th>Contact</th><th>City</th></tr>";



        while($row = mysqli_fetch_assoc($result)){
            $name = htmlspecialchars($row['name']);
            $blood_group = htmlspecialchars($row['blood_group']);
            $contact = htmlspecialchars($row['contact']);
            $city = htmlspecialchars($row['city']);
            echo "<tr>";
            echo "<td>{$name}</td>";
            echo "<td>{$blood_group}</td>";
            echo "<td>{$contact}</td>";
            echo "<td>{$city}</td>";
            // echo "Name: ". $row['name'] .
            //      "| Contact: ". $row['contact'] . 
            //      "| City: ". $row['city'] . "<br>";  
        }
        echo "</table>";
    }
    else{
        $safe_blood_group = htmlspecialchars($row['blood_group']);
        echo "<p>No donors found for ${$safe_blood_group}.</p>";
    }
mysqli_free_result($result);
mysqli_close($conn);
}

?>

</body>
</html>

