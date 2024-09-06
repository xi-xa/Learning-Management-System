<?php
include_once "connection.php";
require __DIR__ . '/sanitation.php';

$id=sanitizeInput($_GET['id']);
	$query = "DELETE FROM tbl_teacher WHERE id = '$id'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Deleted")
		</script>
		<?php
		header("refresh:0;url=index.php");
	}

?>