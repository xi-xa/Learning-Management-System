<?php
include "config.php";

		if(isset($_POST['update']))
		{
		$ids = $_POST['ids'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$addresses = $_POST['addresses'];
		$email = $_POST['email'];

		$sql = "UPDATE tbl_student SET first_name ='$firstname', last_name ='$lastname', address= '$addresses' , email='$email' 
		WHERE SID ='$ids'";

		$result = $mysqli->query($sql);

		if($result == True)
		{
		?>
		<?php
		header("refresh:0;url=account.php");
		}
		else
		{
			echo $mysqli->error;
		}
	}
?>