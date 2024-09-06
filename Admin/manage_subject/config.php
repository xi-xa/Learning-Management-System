<?php

$servername = "localhost";
$username_db = "root"; 
$password_db = ""; 
$dbname = "elms"; 
$conn = new mysqli($servername,$username_db,$password_db,$dbname);


if($conn === false)
{
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>