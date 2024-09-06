
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="/css/studentdashboard.css">
</head>
<body>
    <header class="header">
        <a href="#">Student Dashboard</a>
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
                <a href="course.php">Courses</a>
            </li>
            
            <li>
                <a href="assignment.php">To do assignments</a>
            </li>

            <li>
                <a href="calendar.php">Calendar</a>
            </li>
              
            <li>
                <a href="announcement.php">Announcement Bar</a>
            </li>

            <li>
                <a href="homebar.php">Home Bar</a>
            </li>

        </ul>
    </aside>
</body>
</html>

