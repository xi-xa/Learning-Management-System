<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_teacher SELECT * FROM tbl_archive_teacher WHERE TID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_archive_teacher WHERE TID = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Restore")
		</script>
		<?php
		header("refresh:0;url=accountsarchive.php");
	}
}
else
{
echo "";
}

?>