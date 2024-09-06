<?php include_once 'navs/nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css_admin/manage_account.css">
</head>
<body>
    <div class="whitebox">
        <p>Manage Accounts</p>
        <div class="button-container">
            <button type="button" id="studentadd" class="btn btn-primary">Student</button>
            <button type="button" id="teacheradd" class="btn btn-secondary">Teacher</button>
            <button type="button" id="parentadd" class="btn btn-tertiary">Parent</button>
        </div>

            <div class = "filter-container">
                <form action="" method="get">
                    <input type="text" name="category" placeholder="Search">
                    <button type="submit">Search</button>
                </form>

                <form method="POST" action="">
                <select id="category" name="category" onchange="this.form.submit()">
                    <option value disabled selected>Select a user account</option>
                        <option value="students" <?php echo isset($_POST['category']) && $_POST['category'] == 'students' ? 'selected' : ''; ?>>Students</option>
                        <option value="teachers" <?php echo isset($_POST['category']) && $_POST['category'] == 'teachers' ? 'selected' : ''; ?>>Teachers</option>
                        <option value="parents" <?php echo isset($_POST['category']) && $_POST['category'] == 'parents' ? 'selected' : ''; ?>>Parents</option>
                    </select>
                </form>
            </div>
                <div id="tableContainer">
                    <?php 
                        include_once 'accounts.php';
                    ?>
                </div> 

            <!-- Student Modal -->
            <div id="student-modal" class="student-modal">
                <div class="student-content">
                    <span class="close-student">&times;</span>
                    <h2>Add Student Information</h2>
                    <form action="add_student.php" method="POST">
                        <label for="first_name">First Name:</label>
                        <br>
                        <input type="text" id="first_name" name="first_name" required>
                        <br>
                        <label for="last_name">Last Name:</label>
                        <br>
                        <input type="text" id="last_name" name="last_name" required>
                        <br>
                        <label for="phone_number">Phone Number:</label>
                        <br>
                        <input type="text" id="phone_number" name="phone_number" required>
                        <br>
                        <label for="address">Address:</label>
                        <br>
                        <input type="text" id="address" name="address" required>
                        <br>
                        <label for="email">E-mail:</label>
                        <br>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="password">Password:</label>
                        <br>
                        <input type="password" id="password" name="password" required>
                        <br>
                        <label for="phone_number">Role:</label>
                        <br>
                        <input type="Role" id="Role" name="Role" value = "student" required readonly>
                        <br>
                        <button type="submit">Add Student</button>
                    </form>
                </div>
            </div>

            <!-- Teacher Modal -->
            <div id="teacher-modal" class="teacher-modal">
                <div class="teacher-content">
                    <span class="close-teacher">&times;</span>
                    <h2>Add Teacher Information</h2>
                    <form action="add_teacher.php" method="POST">
                        <label for="first_name">First Name:</label>
                        <br>
                        <input type="text" id="first_name" name="first_name" required>
                        <br>
                        <label for="last_name">Last Name:</label>
                        <br>
                        <input type="text" id="last_name" name="last_name" required>
                        <br>
                        <label for="phone_number">Phone Number:</label>
                        <br>
                        <input type="text" id="phone_number" name="phone_number" required>
                        <br>
                        <label for="address">Address:</label>
                        <br>
                        <input type="text" id="address" name="address" required>
                        <br>
                        <label for="email">E-mail:</label>
                        <br>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="password">Password:</label>
                        <br>
                        <input type="password" id="password" name="password" required>
                        <br>
                        <label for="phone_number">Role:</label>
                        <br>
                        <input type="Role" id="Role" name="Role" value = "teacher" required readonly>
                        <br>
                        <button type="submit">Add Teacher</button>
                    </form>
                </div>
            </div>

            <!-- Parent Modal -->
            <div id="parent-modal" class="parent-modal">
                <div class="parent-content">
                    <span class="close-parent">&times;</span>
                    <h2>Add Parent Information</h2>
                    <form action="add_parent.php" method="POST">
                        <label for="first_name">First Name:</label>
                        <br>
                        <input type="text" id="first_name" name="first_name" required>
                        <br>
                        <label for="last_name">Last Name:</label>
                        <br>
                        <input type="text" id="last_name" name="last_name" required>
                        <br>
                        <label for="phone_number">Phone Number:</label>
                        <br>
                        <input type="text" id="phone_number" name="phone_number" required>
                        <br>
                        <label for="address">Address:</label>
                        <br>
                        <input type="text" id="address" name="address" required>
                        <br>
                        <label for="email">E-mail:</label>
                        <br>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="password">Password:</label>
                        <br>
                        <input type="password" id="password" name="password" required>
                        <br>
                        <label for="phone_number">Role:</label>
                        <br>
                        <input type="Role" id="Role" name="Role" value = "parent" required readonly>
                        <br>
                        <button type="submit">Add Parent</button>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>
<script src="../scripts/accounts.js"></script>
