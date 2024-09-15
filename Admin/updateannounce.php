<?php
			include "connect.php";
			session_start();

		if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
		 {

			 header("refresh:0; ../index.php");
			 exit;
		 }else if(isset($_SESSION['Aid']))
			{
				$userid = $_SESSION['Aid'];
				
				$getrecord = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE Aid ='$userid'");
				while($rowedit = mysqli_fetch_assoc($getrecord))
				{
					$type = $rowedit['Role'];
					$name = $rowedit['fname']." ".$rowedit['lname'];
				}
			}
	//	$sql1 = "Insert into tbl_audithistory (e_name,e_action,e_date) values ('$name','Updating Announcement',NOW())";
		//$result1 = $config->query($sql1);

		
if(isset($_POST['update'])&& isset($_FILES['fileToUpload'])){
	
$img_name = $_FILES['fileToUpload']['name'];
	$img_size = $_FILES['fileToUpload']['size'];
	$tmp_name = $_FILES['fileToUpload']['tmp_name'];
	$error = $_FILES['fileToUpload']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
			header("Location: addannouncement.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
	
			$allowed_exs = array("jpg", "jpeg", "png"); 
	
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
	
				// Insert into Database
                $id = $_POST['id'];
				$update_title = $_POST['update_title'];
				$update_description = $_POST['update_description'];
				$update_date = $_POST['update_date'];
				$sql = "Update tbl_announcements SET title='$update_title', description='$update_description', announcement_date='$update_date', image = '$new_img_name' where id='$id'";
				$result = $conn->query($sql);
			
		

				if($result == True){
				?>
				<script>
				alert("Successfully Update")
				
				</script>
				<?php
				header("refresh:0;url=addannouncement.php");
				
				}else{
					echo $conn->error;
				}
				}
			}
		}
	}
		
				?>