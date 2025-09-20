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
</body>
</html>

<?php
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD']==="POST"){
    $blood_group = $_POST['blood_group'];

    $query = "SELECT * from donors WHERE blood_group = '$blood_group'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        echo "<h2>Availiable Donors:</h2>";

        while($row = mysqli_fetch_assoc($result)){
            echo "Name: ". $row['name'] .
                 "| Contact: ". $row['contact'] . 
                 "| City: ". $row['city'] . "<br>";  
        }
    }
    else{
        echo "<p>No donors found for $blood_group. </p>";
    }
}
?>