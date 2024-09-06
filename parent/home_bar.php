<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Parent Dashboard</title>
        <body>
            <?php include_once 'parentnav.php'; ?>
            <center>       
            <h1>this is Home Bar page</h1>
            </center>  
        </body>
    </head>
</html>

<?php 
session_start();

if(!isset($_SESSION["username"]))
{
    header("location:/logins/login.php");
    exit();
}
?>