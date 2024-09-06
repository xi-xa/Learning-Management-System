<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Teacher Dashboard</title>
        <body>
            <?php include_once 'teachernav.php'; ?>
            <center>       
            <h1>this is Class page</h1>
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