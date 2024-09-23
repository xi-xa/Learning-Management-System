<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_announcements SELECT * FROM tbl_archive_announcements WHERE id = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_archive_announcements WHERE id = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Restore")
		</script>
		<?php
		header("refresh:0;url=archiveannounce.php");
	}
}
else
{
echo "";
}


?>