<?php
	include "config.php";

	$sID = $_GET['id'];

	$sql="SELECT * FROM tbl_student WHERE SID = '$sID'";
	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();

	$studID = $row ['SID'];
	$fname = $row ['first_name'];
	$lname = $row ['last_name'];
	$address = $row ['address'];
	$email = $row ['email'];

		echo $mysqli->error;

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css_admin/update_stud.css">
	</head>
		<body>
			<form method = "POST" action="update_student.php">
				Student ID:
				<input type= "text" name= "ids" value="<?php echo $studID; ?>" readonly>
				<br>
				First Name:
				<input type="text" name= "firstname" value="<?php echo $fname; ?>">
				<br>
				Last Name:
				<input type="text" name= "lastname" value="<?php echo  $lname; ?>">
				<br>
				Address:
				<input type="text" name= "addresses" value="<?php echo  $address; ?>">
				<br>
				Email:
				<input type="text" name= "email" value="<?php echo  $email; ?>">

				<br>
				<input type="submit" name= "update" value="update">
			</form>
		</body>

</html>
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
		header("refresh:0;url=manage_account.php");
		}
		else
		{
			echo $mysqli->error;
		}
	}
?>

