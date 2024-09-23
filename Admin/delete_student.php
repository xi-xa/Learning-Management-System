<?php
include "connect.php";

$ID=$_GET['id'];
$sql = "INSERT INTO tbl_archive_student SELECT * FROM tbl_student WHERE SID = '$ID'";
		
$result = $conn->query($sql);
if($result == True)
{
	$query = "DELETE FROM tbl_student WHERE SID = '$ID'";
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