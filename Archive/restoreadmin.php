<?php
include "../connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_admin SELECT * FROM tbl_archive_admin WHERE Aid = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_archive_admin WHERE Aid = '$ID'";
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