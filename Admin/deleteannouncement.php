<?php
include "connect.php";

if (isset($_POST['id'])) {
    $ID = $conn->real_escape_string($_POST['id']);

    // Insert the announcement into the archive table with the correct columns
    $sql = "INSERT INTO tbl_archive_announcements (id, title, description, announcement_date, created_at, image)
            SELECT id, title, description, announcement_date, created_at, image 
            FROM tbl_announcements 
            WHERE id = '$ID'";

    if ($conn->query($sql) === TRUE) {
        // After archiving, delete the announcement from the original table
        $query = "DELETE FROM tbl_announcements WHERE id = '$ID'";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Announcement successfully archived and deleted.');</script>";
            header("refresh:0;url=addannouncement.php");
        } else {
            echo "Error deleting announcement: " . $conn->error;
        }
    } else {
        echo "Error archiving announcement: " . $conn->error;
    }
} else {
    echo "ID is not set.";
}
?>
