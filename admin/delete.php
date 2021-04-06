<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_mitra = $_GET['id_mitra'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM mitra WHERE id_mitra='$id_mitra'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

