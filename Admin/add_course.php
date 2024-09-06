<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Course</title>
  <style>
    /* Basic Reset and Font */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    /* Header Styles */
    .header {
      background: linear-gradient(45deg, #b40404, #ff7f7f);
      color: white;
      line-height: 70px;
      padding: 0 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    .header a {
      color: white;
      font-size: 24px;
      font-weight: bold;
    }

    /* Sidebar Styles */
    aside {
      background-color: #f5f5f5;
      width: 16%;
      height: 100%;
      position: fixed;
      top: 70px;
      left: 0;
      padding-top: 5%;
      text-align: center;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      z-index: 999;
      overflow-y: auto;
    }

    ul li {
      list-style: none;
      padding-bottom: 20px;
      font-size: 16px;
    }

    ul li a {
      color: #333;
      font-weight: bold;
      display: block;
      padding: 10px 20px;
    }

    ul li a:hover {
      color: #ff0000;
    }

    /* Main Content Area */
    .main-content {
      margin-left: 18%;
      padding: 100px 30px 30px;
      background-color: #ffffff;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .main-content h1 {
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

    input[type="button"] {
      background-color: #b40404;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s, box-shadow 0.3s;
    }

    input[type="button"]:hover {
      background-color: #ff7f7f;
      box-shadow: 0 0 10px rgba(255, 127, 127, 0.5);
    }

    input[type="submit"] {
      background-color: #43AC39;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s, box-shadow 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #1e4618;
      box-shadow: 0 0 10px rgba(255, 127, 127, 0.5);
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .main-content {
        margin-left: 5%;
        padding: 80px 15px 15px;
      }

      aside {
        width: 100%;
        height: auto;
        position: relative;
        padding-top: 0;
        top: 0;
      }

      ul li {
        display: inline-block;
        padding: 10px;
      }

      ul li a {
        padding: 5px 10px;
      }

      .header {
        flex-direction: column;
        line-height: normal;
        padding: 15px;
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <a href="#">Admin Dashboard</a>
  </header>

  <aside>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="account.php">Manage accounts</a></li>
      <li><a href="../admin/course.php">Manage courses</a></li>
      <li><a href="class.php">Manage classes</a></li>
      <li><a href="groupchat.php">Manage group chats</a></li>
      <li><a href="events.php">Manage events</a></li>
      <li><a href="announcement.php">Manage announcements</a></li>
    </ul>
  </aside>

  <div class="main-content">
    <h1>Add Course</h1>
    <form method="post">
      <label for="course_name">Course Name:</label>
      <input type="text" id="course_name" name="course_name"><br><br>
      <label for="course_description">Course Description:</label>
      <textarea id="course_description" name="course_description"></textarea><br><br>
      <label for="course_code">Course Code:</label>
      <input type="text" id="course_code" name="course_code"><br><br>
      <input type="submit" value="Add Course">
      <input type="button" value="Cancel" onclick="window.location.href='manage_courses.php';">
    </form>

    <?php
    // Connect to database
    include __DIR__ . '/config.php';

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
        echo "<script>alert('Course added successfully!'); window.location.href='manage_courses.php';</script>";
      } else {
        echo "Error adding course: " . mysqli_error($conn);
      }
    }

    // Close connection
    mysqli_close($conn);
    ?>
  </div>
</body>

</html>