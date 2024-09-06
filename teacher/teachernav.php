<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" type="text/css" href="/css/teacherdashboard.css">
</head>
<body>
    <header class="header">
        <a href="#">Teacher Dashboard</a>
        <div class="logout">
            <form action="logouts.php" method="post">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </header>

    <aside>
        <ul>
            <li>
                <a href="profile.php">Profile</a>
            </li>

            <li>
                <a href="class.php">Classes</a>
            </li>

            <li>
                <a href="courses.php">Courses</a>
            </li>

            <li>
                <a href="attendance.php">Attendance</a>
            </li>
            
            <li>
                <a href="calendar.php">Calendar</a>
            </li>
              
            <li>
                <a href="homebar.php">Home Bar</a>
            </li>

            <li>
                <a href="assig_grade.php">Assignments to Grade</a>
            </li>

        </ul>
    </aside>
</body>
</html>
