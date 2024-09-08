<?php
include 'connect.php';

// Get the POST data
$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];
$course_description = $_POST['course_description'];
$course_code = $_POST['course_code'];

// Prepare the SQL update query
$sql = "UPDATE courses SET course_name = ?, course_description = ?, course_code = ? WHERE course_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $course_name, $course_description, $course_code, $course_id);

// Execute the query and check for success
if ($stmt->execute()) {
    echo "Course updated successfully!";
} else {
    echo "Error updating course: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();


