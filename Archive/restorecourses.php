<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO courses SELECT * FROM archive_courses WHERE course_id = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM archive_courses WHERE course_id = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Restore")
		</script>
		<?php
		header("refresh:0;url=archivecourses.php");
	}
}
else
{
echo "";
}

?>