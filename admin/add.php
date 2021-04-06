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
$tanggal=date('d-m-Y H:i:s');
$jabatan = $_POST['jabatan'];
$departement = $_POST['departement'];
$nama_mitra = $_POST['nama_mitra'];
$no_ktp = $_POST['no_ktp'];
$kelamin = $_POST['kelamin'];
$mitra_email = $_POST['mitra_email'];
$mitra_pass = md5($_POST['upass']);
$nomorhp = $_POST['nomorhp'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$nopegawai = $_POST['nopegawai'];
$sebagai = $_POST['sebagai'];
$forgot_pass_identity = md5(uniqid(mt_rand()));

$adm = $_POST['administrator'];
$lp = $_POST['laporan'];
$exp = $_POST['exportimport'];

	$no_ktp = trim($no_ktp);
	$mitra_email = trim($mitra_email);
	$mitra_pass = trim($mitra_pass);
	
	// email exist or not
	$query = "SELECT * FROM mitra WHERE mitra_email='$mitra_email' and no_ktp='$no_ktp'";
	$result = mysqli_query($mysqli, $query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	
	if($count == 0){
		
	$picture = $_POST['picture'];
	if(empty($_FILES['picture']['name'])){
		$picture=$_POST['picture'];
	}else{
		$pipis=$_FILES['picture']['name'];
		$picture=str_replace(" ", "", $pipis);
		//definisikan variabel file dan kendaraan file
		$uploaddir='../fotobarang/';
		$kendaraanfile=$uploaddir.$picture;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file(str_replace(" ", "", $_FILES['picture']['tmp_name']),$kendaraanfile);
	}
	
$dokumen = $_POST['dokumen'];
	if(empty($_FILES['dokumen']['name'])){
		$dokumen=$_POST['dokumen'];
	}else{
		$dokumen=$_FILES['dokumen']['name'];
		//definisikan variabel file dan kendaraan file
		$jumpakj='../foto_mitra/';
		$limes=$jumpakj.$dokumen;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['dokumen']['tmp_name'],$limes);
	}
	
		if(mysqli_query($mysqli, "INSERT INTO `mitra` (`id_mitra`, `saldo`, `bankmitra`, `rekmitra`, `namarekmitra`, `jambuka`, `alamat`, `kecamatan`, `kota`, `propinsi`, `nama_mitra`, `foto_mitra`, `kelamin`, `latmitra`, `lngmitra`, `nomorhp`, `no_ktp`, `mitra_email`, `mitra_pass`, `dokumen`, `sebagai`, `tanggal`, `suspen`, `idunik`, `kodearea`, `nourut`, `jabatan`, `departement`, `title`, `nopegawai`, `laporan`, `sales`, `mitrausaha`, `exportimport`, `administrator`, `forgot_pass_identity`) VALUES (NULL, '0', '-', '-', '-', '-', '$alamat', '$kecamatan', '$kota', '$propinsi', '$nama_mitra', '$picture', '$kelamin', '$latmitra', '$lngmitra', '$nomorhp', '$no_ktp', '$mitra_email', '$mitra_pass', '$dokumen', '$sebagai', '$tanggal', '0', '$idunik', '$kodearea', '$nourut', '$jabatan', '$departement', '$title', '$nopegawai', '$lp', '$sl', '$mit', '$exp', '$adm', '$forgot_pass_identity');"))
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
			?><div style="color: #F0;">Email/No KTP has ben registered</div><?php
	}
	
}
?>