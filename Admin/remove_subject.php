<?php
// Connect to database
include __DIR__ . '/config.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$subID = $_GET["id"];

$sql = "DELETE FROM tbl_subject WHERE subID = '$subID'";
if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Subject removed successfully!')</script>";
} else {
  echo "Error removing subject: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
header("refresh:0;url=manage_subject.php");
exit;
