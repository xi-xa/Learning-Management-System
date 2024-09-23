<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_archive_admin SELECT * FROM tbl_admin WHERE Aid = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_admin WHERE Aid = '$ID'";
	if ($conn->query($query) == TRUE) 
	{
		?>
		<script>
		alert("Successfully Deleted")
		</script>
		<?php
		header("refresh:0;url=manage_account.php");
	}
}
else
{
echo "";
}

?>