<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="/css/nav.css">
        <body>
            <?php include_once 'navs/nav.php'; ?>
            <center>       
            <h1>this is class page</h1>
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