<?php
include "config.php";

// Retrieve the 'id' parameter from the GET request
$PID = $mysqli->real_escape_string($_GET['id']);

// Prepare separate delete queries for each table
$queries = [
    "DELETE FROM tbl_parent WHERE PID = '$PID'",
];

// Execute each query
$success = true;
foreach ($queries as $query) {
    if (!$mysqli->query($query)) {
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
    echo "Error: " . $mysqli->error;
}

?>