<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_archive_subject SELECT * FROM tbl_subject WHERE subID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_subject WHERE  subID = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Deleted")
		</script>
		<?php
		header("refresh:0;url=manage_subject.php");
	}
}
else
{
echo "";
}

?>