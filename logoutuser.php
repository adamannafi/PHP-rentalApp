<?php
session_start();
include "dbconnect.php";  
$id_user=$_SESSION['user'];

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{

	session_destroy();
	unset($_SESSION['user']);
	header("Location: index.php");
}
?>