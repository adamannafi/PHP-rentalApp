<?php
//including the database connection file
include("../dbconnect.php");

//getting id of the data from url
$id_liburan = $_GET['id_liburan'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM liburnasional WHERE id_liburan='$id_liburan'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

