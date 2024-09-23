<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_archive_section SELECT * FROM tbl_section WHERE secID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_section WHERE secID = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Deleted")
		</script>
		<?php
		header("refresh:0;url=manage_classes.php");
	}
}
else
{
echo "";
}

?>