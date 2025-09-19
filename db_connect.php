<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blood_donation';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn){
    die("connection Failed: ". mysqli_connect_error());

}

mysqli_set_charset($conn, 'utf8mb4');


?>