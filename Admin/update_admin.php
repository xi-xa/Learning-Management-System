<?php
	include "connect.php";

	$id = $_GET['id'];
	$sql="SELECT * FROM tbl_admin  WHERE Aid = '$id'
	";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	$Aid = $row ['Aid'];
	$fname = $row ['fname'];
	$lname = $row ['lname'];
	$lname = $row ['phone'];
	$username = $row ['username'];
	$email = $row ['email'];
    $admin_id = $row['Admin_ID'];
    $password = $row ['password'];
    $role = $row['Role'];

		echo $conn->error;

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css_admin/update_stud.css">
	</head>
		<body>
			<form method = "POST" action="update_admin.php">
                Admin ID:
				<input type="text" name= "admin_id" value="<?php echo  $admin_id; ?>">

				<br>
				First Name:
				<input type="text" name= "firstname" value="<?php echo $fname; ?>">
				<br>
				Last Name:
				<input type="text" name= "lastname" value="<?php echo  $lname; ?>">
				<br>
				Username:
				<input type="text" name= "username" value="<?php echo  $username; ?>">
				<br>
				Email:
				<input type="text" name= "email" value="<?php echo  $email; ?>">
				<br>
                Role:
				<input type="text" name= "role" value="<?php echo  $role; ?>">

				<br>
				<input type="submit" name= "update" value="update">
			</form>
		</body>

</html>
<?php
include "connect.php";

		if(isset($_POST['update']))
		{
		$ids = $_POST['ids'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$addresses = $_POST['addresses'];
		$email = $_POST['email'];

		$sql = "UPDATE tbl_parent SET first_name ='$firstname', last_name ='$lastname', address= '$addresses' , email='$email' 
		WHERE PID ='$ids'";

		$result = $conn->query($sql);

		if($result == True)
		{
		?>
		<?php
		header("refresh:0;url=manage_account.php");
		}
		else
		{
			echo $conn->error;
		}
	}
?>

