<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blood_donation';

try {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $db_connect_error = '';
    mysqli_set_charset($conn, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    $db_connect_error = $e->getMessage();
    $conn = false;
}


// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// if (!$conn){
//     $db_connect_error = mysqli_connect_error();
// }else{
//     $db_connect_error = '';
//     mysqli_set_charset($conn, 'utf8mb4');
// }




?>