<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update this if needed
$dbname = "db_asac";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
