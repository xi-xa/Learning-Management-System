<?php
// Include the database connection
include 'connect.php';

$result = $conn->query("SELECT * FROM tbl_announcements");

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'title' => $row['title'],
        'date' => $row['announcement_date']
    ];
}
?>

<div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: <?php echo json_encode($events); ?>
    });
    calendar.render();
});
</script>
