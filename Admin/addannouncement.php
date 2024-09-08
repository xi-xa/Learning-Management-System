<?php
// Include the database connection
include 'connect.php';

// Handle form submission for creating announcements
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_title'])) {
        $title = $_POST['create_title'];
        $description = $_POST['create_description'];
        $announcement_date = $_POST['create_date'];

        $stmt = $conn->prepare("INSERT INTO tbl_announcements (title, description, announcement_date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $announcement_date);

        if ($stmt->execute()) {
            echo "<p>Announcement created successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
        exit;
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['update_title'];
        $description = $_POST['update_description'];
        $announcement_date = $_POST['update_date'];

        $stmt = $conn->prepare("UPDATE tbl_announcements SET title = ?, description = ?, announcement_date = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $description, $announcement_date, $id);

        if ($stmt->execute()) {
            echo "<p>Announcement updated successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
        exit;
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM tbl_announcements WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<p>Announcement deleted successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
        exit;
    }
}

// Fetch existing announcements
$result = $conn->query("SELECT * FROM tbl_announcements");
$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['announcement_date'] // FullCalendar expects 'start' property
    ];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            padding-top: 60px;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .action-buttons {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }
        .action-buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #ffc107;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .edit-btn:hover {
            background-color: #e0a800;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<button id="openCreateModal">Add Announcement</button>

<!-- Create Announcement Modal -->
<div class="modal" id="createModal">
    <div class="modal-content">
        <span class="close" data-modal="createModal">&times;</span>
        <h2>Create Announcement</h2>
        <form method="POST" action="">
            <label for="create_title">Title:</label>
            <input type="text" id="create_title" name="create_title" required><br>

            <label for="create_description">Description:</label>
            <textarea id="create_description" name="create_description" required></textarea><br>

            <label for="create_date">Date:</label>
            <input type="date" id="create_date" name="create_date" required><br>

            <button type="submit">Create Announcement</button>
        </form>
    </div>
</div>


<!-- Choose Action Modal -->
<div class="modal" id="choiceModal">
    <div class="modal-content">
        <span class="close" data-modal="choiceModal">&times;</span>
        <h2>Choose Action</h2>
        <p>Do you want to update or delete this announcement?</p>
        <div class="action-buttons">
            <button id="updateChoiceBtn" class="edit-btn">Update</button>
            <button id="deleteChoiceBtn" class="delete-btn">Delete</button>
        </div>
    </div>
</div>

<!-- Update Announcement Modal -->
<div class="modal" id="updateModal">
    <div class="modal-content">
        <span class="close" data-modal="updateModal">&times;</span>
        <h2>Update Announcement</h2>
        <form id="updateForm" method="POST" action="">
            <input type="hidden" id="update_id" name="id">
            <label for="update_title">Title:</label>
            <input type="text" id="update_title" name="update_title" required><br>

            <label for="update_description">Description:</label>
            <textarea id="update_description" name="update_description" required></textarea><br>

            <label for="update_date">Date:</label>
            <input type="date" id="update_date" name="update_date" required><br>

            <button type="submit" name="update">Update Announcement</button>
        </form>
    </div>
</div>

<!-- Delete Announcement Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <span class="close" data-modal="deleteModal">&times;</span>
        <h2>Delete Announcement</h2>
        <form id="deleteForm" method="POST" action="">
            <input type="hidden" id="delete_id" name="id">
            <p>Are you sure you want to delete this announcement?</p>
            <button type="submit" name="delete">Delete Announcement</button>
        </form>
    </div>
</div>

<div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: <?php echo json_encode($events); ?>,
        eventClick: function(info) {
            var id = info.event.id;
            var title = info.event.title;
            var date = info.event.startStr;

            document.getElementById('update_id').value = id;
            document.getElementById('update_title').value = title;
            document.getElementById('update_date').value = date;
            document.getElementById('delete_id').value = id;

            // Show the choice modal
            document.getElementById('choiceModal').style.display = 'block';
        }
    });
    calendar.render();

    // Modal handling
    var modals = document.querySelectorAll('.modal');
    var openCreateModalBtn = document.getElementById('openCreateModal');
    
    openCreateModalBtn.onclick = function() {
        document.getElementById('createModal').style.display = 'block';
    }

    document.querySelectorAll('.close').forEach(function(span) {
        span.onclick = function() {
            var modalId = this.getAttribute('data-modal');
            document.getElementById(modalId).style.display = 'none';
        }
    });

    document.getElementById('updateChoiceBtn').onclick = function() {
        document.getElementById('choiceModal').style.display = 'none';
        document.getElementById('updateModal').style.display = 'block';
    };

    document.getElementById('deleteChoiceBtn').onclick = function() {
        document.getElementById('choiceModal').style.display = 'none';
        document.getElementById('deleteModal').style.display = 'block';
    };

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    }
});
</script>

</body>
</html>
