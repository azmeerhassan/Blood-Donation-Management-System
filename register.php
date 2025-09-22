<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Donor</title>
    <style>
        .success {
            color: green;
            font-weight: bold;
            padding: 8px;
            border: 1px solid green;
            background-color: #e6ffe6;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .error {
            color: red;
            font-weight: bold;
            padding: 8px;
            border: 1px solid red;
            background-color: #ffe6e6;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!empty($db_connect_error)) {
        echo "<p class='error' style='color: red; font-weight: bold;'>❌ Database connection failed: "
             . htmlspecialchars($db_connect_error) . "</p>";
    }else{
$name = $_POST['name'];
$blood_group = $_POST['blood_group'];
$contact = $_POST['contact'];
$city = $_POST['city'];

$sql = "INSERT INTO donors (name, blood_group, contact, city)
        VALUES('$name', '$blood_group', '$contact', '$city')"; 
        
    if (mysqli_query($conn, $sql)) {
    echo "<p class='success' style='color: green; font-weight: bold;'>✅ Donor registered successfully!</p>";
}       else {
    echo "<p class='error' style='color: red; font-weight: bold;'>❌ Insert failed: "
         . htmlspecialchars(mysqli_error($conn)) . "</p>";
}

}
}
if($conn){
    mysqli_close($conn);
}
?>