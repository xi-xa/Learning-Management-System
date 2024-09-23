<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO archive_courses SELECT * FROM courses WHERE course_id = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM courses WHERE course_id = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Deleted")
		</script>
		<?php
		header("refresh:0;url=manage_courses.php");
	}
}
else
{
echo "";
}

?>