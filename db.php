<?php
$host = "localhost";
$user = "root"; // your DB user
$password = ""; // your DB password (empty usually on XAMPP)
$database = "contact_manager_db"; // your DB name

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
