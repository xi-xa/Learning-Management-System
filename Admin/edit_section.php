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
            text-decoration: none;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(45deg, #b40404, #ff7f7f);
            background-size: 400% 400%;
            color: white;
            line-height: 70px;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: gradientBG 10s ease infinite;
            transition: background 0.3s ease;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header a {
            color: white;
            font-size: 24px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .header:hover {
            background: linear-gradient(45deg, #ff7f7f, #b40404);
        }

        /* Logout Button Styles */
        .logout-button {
            background-color: white;
            color: #b40404;
            border: 1px solid #b40404;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .logout-button:hover {
            background-color: #b40404;
            color: white;
            box-shadow: 0 0 15px rgba(180, 4, 4, 0.5);
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
            border-radius: 10px;
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
            transition: color 0.3s ease;
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
        }

        /* Form Styles */
        .form-container {
            margin-top: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #00000092;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .form-container .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .form-container .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .form-container .btn-submit {
            background-color: #43AC39;
            color: white;
            border: none;
        }

        .form-container .btn-submit:hover {
            background-color: #1e4618;
        }

        .form-container .btn-cancel {
            background-color: #b40404;
            color: white;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .form-container .btn-cancel:hover {
            background-color: #ff0000;
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
    <title>Edit Section</title>
</head>

<body>
    <?php
    // Connect to database
    include 'connect.php';
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get section ID from URL parameter
    $section_id = $_GET["id"];
    // Retrieve course details from database
    $sql = "SELECT * FROM tbl_section WHERE secID = '$section_id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $row1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_gradelevel WHERE gradeID = '$section_id'")); ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $section = $_POST["section_name"];
        $grade_level = $_POST["grade_level"];
        $section_code = $_POST["section_code"];

        //$sql = "UPDATE courses SET course_name = '$course_name', course_description = '$course_description', course_code = '$course_code' WHERE course_id = '$course_id'";
        $conn->begin_transaction();

        try {
            // SQL query to insert data into tbl_section
            $sql1 = "UPDATE tbl_section SET section = '$section', section_code = '$section_code' WHERE secID = '$section_id'";
            $conn->query($sql1);

            // SQL query to insert data into tbl_gradelevel
            $sql2 = "UPDATE tbl_gradelevel SET grade_level = '$grade_level' WHERE gradeID = '$section_id'";
            $conn->query($sql2);

            // Commit transaction
            $conn->commit();
            echo "Section updated successfully";
            header("refresh:0;url=manage_classes.php");
        } catch (Exception $e) {
            // Rollback transaction
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }

    // Close connection
    mysqli_close($conn);
    ?>
    <header class="header">
        <a href="#">Admin Dashboard</a>
        <div class="logout">
            <form action="logout.php" method="post">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
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
        <h1>Update Section</h1>

        <div class="form-container">
            <form method="post">
                <label for="section_name">Section Name:</label>
                <input type="text" id="section_name" name="section_name" value="<?php echo $row['section']; ?>"
                    required>

                <label for="grade_level">Grade Level:</label>
                <select id="grade_level" name="grade_level" required>
                    <option value="<?php echo $row1['grade_level']; ?>"><?php echo $row1['grade_level']; ?></option>
                    <option value="Grade 7">Grade 7</option>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select>

                <label for="section_code">Section Code:</label>
                <input type="text" id="section_code" name="section_code" value="<?php echo $row['section_code']; ?>"
                    required>

                <div class="btn-group">
                    <input type="submit" class="btn btn-submit" value="Update Section">
                    <a href="manage_classes.php" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>