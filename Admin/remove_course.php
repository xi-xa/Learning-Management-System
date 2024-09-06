<?php
// Connect to database
include __DIR__ . '/config.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get course ID from URL parameter
$course_id = $_GET["id"];

// Delete course from database
$sql = "DELETE FROM courses WHERE course_id = '$course_id'";
if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Course removed successfully!')</script>";
} else {
  echo "Error removing course: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
// Redirect to manage courses page
//header("Location: manage_courses.php");
header("refresh:0;url=manage_courses.php");
exit;
