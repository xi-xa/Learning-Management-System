<?php
include_once "connection.php";
require __DIR__ . "/sanitation.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    die("No ID provided.");
}

if (isset($_POST["update"])) {
    $teacher_id = sanitizeInput($_POST["Teacher_ID"]);
    $first_name = sanitizeInput($_POST["fname"]);
    $middle_name = sanitizeInput($_POST["mname"]);
    $last_name = sanitizeInput($_POST["lname"]);
    $email = sanitizeInput($_POST["email"]);
    $users = sanitizeInput($_POST["users"]);

    if (!empty($id)) {
        $sql = "UPDATE `tbl_teacher` SET `teacher_id` = '$teacher_id', `fname` = '$first_name', `mname` = '$middle_name', `lname` = '$last_name', `email` = '$email', `users` = '$users' WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php");
            echo '<script>alert("Info Successfully Updated")</script>';
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid ID.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher Information</title>
    <link rel="stylesheet" href="update.css">
    <script nonce="randomNonceValue" src="validation.js"></script>
</head>
<body>
    <?php // Ensure $id is set and valid
    if (isset($id)) {
        $sql = "SELECT * FROM `tbl_teacher` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<p>No record found for this ID.</p>";
            exit();
        }
    } else {
        echo "<p>No ID provided.</p>";
        exit();
    } ?>
    <div class="teacher-form-container">
        <form action="update-teacher.php?id=<?php echo $id; ?>" method="POST">
            <h1 class="head">Update Teacher Info</h1>
            <input type="hidden" name="Tid" value="<?php echo $id; ?>">
            <input type="text" name="Teacher_ID" placeholder="Teacher" type="number" id="Tid" value="<?php echo $row[
                "teacher_id"
            ]; ?>">
            <input type="text" name="fname" placeholder="First Name" id="fname" value="<?php echo $row[
                "fname"
            ]; ?>">
            <input type="text" name="mname" placeholder="Middle Name" id="mname" value="<?php echo $row[
                "mname"
            ]; ?>">
            <input type="text" name="lname" placeholder="Last Name" id="lname" value="<?php echo $row[
                "lname"
            ]; ?>">
            <input type="text" name="email" placeholder="Email" id="email" value="<?php echo $row[
                "email"
            ]; ?>">
            <input type="text" name="users" placeholder="Username" id="username" value="<?php echo $row[
                "users"
            ]; ?>">
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
