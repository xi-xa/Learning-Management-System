<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div class="teacher-form-container">
        <div class="container">
            <h1 class="head">Teacher Information</h1>
            <button type="button" onclick="window.location.href='add-teacher.php'" class="btn btn-primary">Add Teacher</button>
        </div>
        
        <table>
            <tr>
                <th>Teacher ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <!--<th>Subject/Section/Level</th>-->
                <th>Action</th>
            </tr>

            <?php
            include_once "connection.php";
            $sql = "SELECT * FROM tbl_teacher";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Error: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" .
                        htmlspecialchars($row["teacher_id"]) .
                        "</td>";
                    echo "<td>" . htmlspecialchars($row["fname"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["lname"]) . "</td>";
                    //echo "<td>" . htmlspecialchars($row['subject_section_level']) . "</td>";
                    echo "<td>
                    <button type='button' class='btn' onclick=\"window.location.href='update-teacher.php?id=" .
                        $row["id"] .
                        "'\">Update</button>
                    <button type='button' class='btn' onclick=\"window.location.href='delete-teacher.php?id=" .
                        $row["id"] .
                        "'\">Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>

