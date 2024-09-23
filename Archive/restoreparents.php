<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_parent SELECT * FROM tbl_archive_parent WHERE PID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_archive_parent WHERE PID = '$ID'";
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