<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Basic Reset and Font */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    /* Main Content Area */
    body {
      padding: 30px;
      background-color: #f7f7f7;
    }

    h1 {
      font-size: 32px;
      margin-bottom: 20px;
      color: #b40404;
      text-align: center;
    }

    /* Form Styles */
    form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    label {
      display: block;
      font-size: 16px;
      margin-bottom: 8px;
      color: #333;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 20px;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    textarea:focus {
      border-color: #b40404;
      outline: none;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #b40404;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s, box-shadow 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #ff7f7f;
      box-shadow: 0 0 10px rgba(255, 127, 127, 0.5);
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      form {
        padding: 15px;
      }

      input[type="text"],
      textarea {
        font-size: 14px;
      }

      input[type="submit"] {
        width: 100%;
        padding: 10px 0;
      }
    }
  </style>
  <title>Edit Course</title>
</head>

<body>
  <?php
  // Connect to database
  include __DIR__ . '/config.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get course ID from URL parameter
  $course_id = $_GET["id"];

  // Retrieve course details from database
  $sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // Display edit form
  echo "<h1>Update Course</h1>";
  echo "<form method='post'>";
  echo "<label for='course_name'>Course Name:</label>";
  echo "<input type='text' id='course_name' name='course_name' value='" . $row["course_name"] . "'>";
  echo "<br><br>";
  echo "<label for='course_description'>Course Description:</label>";
  echo "<textarea id='course_description' name='course_description'>" . $row["course_description"] . "</textarea>";
  echo "<br><br>";
  echo "<label for='course_code'>Course Code:</label>";
  echo "<input type='text' id='course_code' name='course_code' value='" . $row["course_code"] . "'>";
  echo "<br><br>";
  echo "<input type='submit' value='Update Course'>";
  echo "</form>";

  // Update course details in database
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST["course_name"];
    $course_description = $_POST["course_description"];
    $course_code = $_POST["course_code"];

    $sql = "UPDATE courses SET course_name = '$course_name', course_description = '$course_description', course_code = '$course_code' WHERE course_id = '$course_id'";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Course Updated successfully')</script>";
      header("refresh:0;url=manage_courses.php");
    } else {
      echo "Error updating course: " . mysqli_error($conn);
    }
  }

  // Close connection
  mysqli_close($conn);
  ?>
</body>

</html>
