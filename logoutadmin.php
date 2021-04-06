<?php
session_start();
include "dbconnect.php";  
$id_user=$_SESSION['mitra'];

if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['mitra'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{

	session_destroy();
	unset($_SESSION['mitra']);
	header("Location: index.php");
}
?>