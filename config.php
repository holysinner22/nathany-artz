<?php
$host = "localhost";
$user = "nathanya_admin";
$pass = "nathanyartz2025";
$dbname = "nathanya_art_gallery";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
