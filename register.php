<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!empty($db_connect_error)) {
        echo "<p style='color: red; font-weight: bold;'>❌ Database connection failed: "
             . htmlspecialchars($db_connect_error) . "</p>";
    }else{
$name = $_POST['name'];
$blood_group = $_POST['blood_group'];
$contact = $_POST['contact'];
$city = $_POST['city'];

$sql = "INSERT INTO donors (name, blood_group, contact, city)
        VALUES('$name', '$blood_group', '$contact', '$city')"; 
        
    if (mysqli_query($conn, $sql)) {
    echo "<p style='color: green; font-weight: bold;'>✅ Donor registered successfully!</p>";
}       else {
    echo "<p style='color: red; font-weight: bold;'>❌ Insert failed: "
         . htmlspecialchars(mysqli_error($conn)) . "</p>";
}

}
}
if($conn){
    mysqli_close($conn);
}
?>