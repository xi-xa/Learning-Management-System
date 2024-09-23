<?php
if(isset($_POST['logout']))
{
	#$viewloginl = "Insert into tbl_audithistory (e_name,e_action,e_date) values ('$name','Logged out',NOW())";
	
	#$result1 = $config->query($viewloginl);
	session_destroy();
	unset($_SESSION['Aid']);
	header('Location:../index.php');

}
?>