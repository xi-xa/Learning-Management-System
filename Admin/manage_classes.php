<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">


</head>

<body>


  
<?php include_once 'navs/nav.php'; ?>
    <div class="main-content">

    <div class="header-content">
        <h1>Manage Classes / Sections</h1>
        <form method="GET" class="search-form">
            <input type="text" class="search-bar" name="search" placeholder="Search section..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </div>
    <button class="btn" onclick="location.href='add_section.php'">Add New Section</button>
    <div class="table-container">
    <?php
// Connect to database
include "connect.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve search input
$search = isset($_GET['search']) ? $_GET['search'] : '';

// SQL query with search condition
if ($search) {
    $sql = "SELECT tbl_gradelevel.grade_level, tbl_section.section_code,tbl_section.section, tbl_section.secID AS secID
            FROM tbl_section
            JOIN tbl_gradelevel ON tbl_section.secID = tbl_gradelevel.gradeID
            WHERE tbl_section.section LIKE '%$search%' OR tbl_section.section_code LIKE '%$search%' OR tbl_gradelevel.grade_level LIKE '%$search%'";
} else {
    $sql = "SELECT tbl_gradelevel.grade_level, tbl_section.section_code,tbl_section.section, tbl_section.secID AS secID
            FROM tbl_section
            JOIN tbl_gradelevel ON tbl_section.secID = tbl_gradelevel.gradeID";
}

$result = mysqli_query($conn, $sql);

// Display list of students with their sections
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Section</th><th>Grade Level</th><th>Section Code</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["section"] . "</td>";
        echo "<td>" . $row["grade_level"] . "</td>";
        echo "<td>" . $row["section_code"] . "</td>";
        echo "<td>";
        echo "<button class='btn' onclick='location.href=\"edit_section.php?id=" . $row["secID"] . "\"'>Edit</button> ";
        echo "<button class='btn btn-remove' onclick='location.href=\"remove_section.php?id=" . $row["secID"] . "\"'>Archive</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No students found.</p>";
}

// Close connection
mysqli_close($conn);
?>

    </div>
</div>
</body>

</html>
