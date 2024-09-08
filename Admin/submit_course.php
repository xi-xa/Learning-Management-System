<?php
    // Connect to database
    include __DIR__ . '/connect.php';

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $course_name = $_POST["course_name"];
      $course_description = $_POST["course_description"];
      $course_code = $_POST["course_code"];

      // Insert data into database
      $sql = "INSERT INTO courses (course_name, course_description, course_code) VALUES ('$course_name', '$course_description', '$course_code')";

      if (mysqli_query($conn, $sql)) {
        echo "Course added successfully!";
      } else {
        echo "Error adding course: " . mysqli_error($conn);
      }
    }

    // Close connection
    mysqli_close($conn);
