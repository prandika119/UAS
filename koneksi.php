<?php 
$username = "root";
$password = "";
$database = "web_masjid";
$port = "3307";
$servername = "localhost";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}; 
?>