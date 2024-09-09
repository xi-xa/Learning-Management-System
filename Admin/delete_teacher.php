<?php
include "connect.php";

// Retrieve the 'id' parameter from the GET request
$TID = $conn->real_escape_string($_GET['id']);

// Prepare separate delete queries for each table
$queries = [
    "DELETE FROM tbl_teacher WHERE TID = '$TID'",
];

// Execute each query
$success = true;
foreach ($queries as $query) {
    if (!$conn->query($query)) {
        $success = false;
        break;
    }
}

if ($success) {
    ?>
    <script>
    alert("Successfully Deleted");
    </script>
    <?php
    header("refresh:0;url=manage_account.php");
} else {
    echo "Error: " . $conn->error;
}

?>