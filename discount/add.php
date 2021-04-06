<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<?php

if(isset($_POST['submit']))
{
$tanggal_liburan=date('d-m-Y H:i:s');

$keterangan_liburan = $_POST['keterangan_liburan'];
$di = $_POST['diskon'];

	// email exist or not
	$query = "SELECT * FROM liburnasional WHERE keterangan_liburan='$keterangan_liburan'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){

		if(mysqli_query($mysqli, "INSERT INTO `liburnasional` (`id_liburan`, `tanggal_liburan`, `keterangan_liburan`, `diskon`) VALUES (NULL, '$tanggal_liburan', '$keterangan_liburan', '$di');"))
		{
			?>
	<script>document.location.href="index.php";</script>
			<?php
		}
		else
		{
			?><div style="color: #F0;">Busy Server</div><?php
		}		
	}
	else{
			?><div style="color: #F0;">Discount has ben registered</div><?php
	}
	
}
?>