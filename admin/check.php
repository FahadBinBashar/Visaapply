<?php
$servername = "localhost";
$username = "eshayata_admin";
$password = "2D5EVsuJl!2!s3*";
$dbname = "eshayata_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
$conn->close();
?>