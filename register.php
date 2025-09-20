<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$name = $_POST['name'];
$blood_group = $_POST['blood_group'];
$contact = $_POST['contact'];
$city = $_POST['city'];

$sql = "INSERT INTO donors (name, blood_group, contact, city)
        VALUES('$name', '$blood_group', '$contact', '$city')"; 
        
    if(mysqli_query($conn, $sql)){
        echo "✅ Donor registered successfully!";
    }else{
        echo "❌ Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);


// echo "Donor Name: " . $name . "<br>";
// echo "Blood Group: " . $blood_group . "<br>";
// echo "Contact: " . $contact . "<br>";
// echo "City: " . $city . "<br>";
?>