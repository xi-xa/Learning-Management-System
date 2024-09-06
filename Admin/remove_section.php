<?php
// Connect to database
include __DIR__ . '/config.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get course ID from URL parameter
$secID = $_GET["id"];

$conn->begin_transaction();

try {
    
    $sql1 = "DELETE FROM tbl_section WHERE secID = '$secID'";
    $conn->query($sql1);

    // SQL query to insert data into tbl_gradelevel
    $sql2 = "DELETE FROM tbl_gradelevel WHERE gradeID = '$secID'";
    $conn->query($sql2);

    // Commit transaction
    $conn->commit();
    echo "<script>alert('Subject removed successfully!'); window.location.href='manage_classes.php';</script>";
} catch (Exception $e) {
    // Rollback transaction
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close connection
mysqli_close($conn);

exit;
