<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_subject SELECT * FROM tbl_archive_subject WHERE subID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_archive_subject WHERE subID = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Restore")
		</script>
		<?php
		header("refresh:0;url=archivesubject.php");
	}
}
else
{
echo "";
}

?>