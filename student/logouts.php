<?php
session_start();
session_destroy();
header("location:/logins/login.php");
?>