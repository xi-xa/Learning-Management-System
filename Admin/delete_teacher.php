<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_archive_teacher SELECT * FROM tbl_teacher WHERE TID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_teacher WHERE TID = '$ID'";
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