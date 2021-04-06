<?php
session_start();
include_once '../dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: ../index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
	$kang=mysqli_query($mysqli, "SELECT * from info where idinfo='1'");
	$info=mysqli_fetch_array($kang);
	$nas=mysqli_query($mysqli, "SELECT * from settinglang where status='Default'");
	$lang=mysqli_fetch_array($nas);
	$activelang=$lang['nameset'];
	$sd=mysqli_query($mysqli, "SELECT * from language where namelang='$activelang'");
	$set=mysqli_fetch_array($sd);

$id_mitra = $_GET['id_mitra'];
$row=mysqli_fetch_array(mysqli_query($mysqli, "select * from mitra where id_mitra='$id_mitra'"));

if(isset($_POST['post']))
{
	
	$nama_mitra = mysqli_real_escape_string($mysqli, $_POST['nama_mitra']);
	$nopegawai = mysqli_real_escape_string($mysqli, $_POST['nopegawai']);
	$no_ktp = mysqli_real_escape_string($mysqli, $_POST['no_ktp']);
	$sim = mysqli_real_escape_string($mysqli, $_POST['sim']);
	$dokumen = mysqli_real_escape_string($mysqli, $_POST['dokumen']);
	$kendaraan = mysqli_real_escape_string($mysqli, $_POST['kendaraan']);
	$latmitra = mysqli_real_escape_string($mysqli, $_POST['latmitra']);
	$lngmitra = mysqli_real_escape_string($mysqli, $_POST['lngmitra']);
	$nomorhp = mysqli_real_escape_string($mysqli, $_POST['nomorhp']);
	$sebagai = mysqli_real_escape_string($mysqli, $_POST['sebagai']);
	$bankmitra = mysqli_real_escape_string($mysqli, $_POST['bankmitra']);
	$rekmitra = mysqli_real_escape_string($mysqli, $_POST['rekmitra']);
	$mitra_pass = mysqli_real_escape_string($mysqli, md5($_POST['upass']));
	$jambuka = mysqli_real_escape_string($mysqli, $_POST['jambuka']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
	$kota = mysqli_real_escape_string($mysqli, $_POST['kota']);
	$propinsi = mysqli_real_escape_string($mysqli, $_POST['propinsi']);
	$kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
	$kabupaten = mysqli_real_escape_string($mysqli, $_POST['kabupaten']);
	$tanggal = mysqli_real_escape_string($mysqli, $_POST['tanggal']);
	$id_mitra = mysqli_real_escape_string($mysqli, $_POST['id_mitra']);
	$idunik = mysqli_real_escape_string($mysqli, $_POST['idunik']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$nourut = mysqli_real_escape_string($mysqli, $_POST['nourut']);
	$departement = mysqli_real_escape_string($mysqli, $_POST['departement']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);
	
	
	$opd = mysqli_real_escape_string($mysqli, $_POST['opd']);
	$lhp = mysqli_real_escape_string($mysqli, $_POST['lhp']);
	$peg = mysqli_real_escape_string($mysqli, $_POST['peg']);
	$adm = mysqli_real_escape_string($mysqli, $_POST['adm']);
	$exp = mysqli_real_escape_string($mysqli, $_POST['exp']);
	$no_ktp = trim($no_ktp);
	$email = trim($email);
	
	if(empty($_FILES['picture']['name'])){
		$picture=$_POST['sicture'];
	}else{
		$picture=$_FILES['picture']['name'];
		//definisikan variabel file dan kendaraan file
		$uploaddir='../../picture/';
		$kendaraanfile=$uploaddir.$picture;
		//periksa jika proses upload berjalan sukses
		$upload=move_uploaded_file($_FILES['picture']['tmp_name'],$kendaraanfile);
	}
	
$dokumen = $_POST['dokumen'];
	if(empty($_FILES['dokumen']['name'])){
		$dokumen=$_POST['dokumen'];
	}else{
		$dokumen=$_FILES['dokumen']['name'];
		//definisikan variabel file dan kendaraan file
		$jumpakj='../../foto_mitra/';
		$limes=$jumpakj.$dokumen;
		//periksa jika proses upload berjalan sukses
		$rupso=move_uploaded_file($_FILES['dokumen']['tmp_name'],$limes);
	}
$query=mysqli_query($mysqli, "UPDATE `mitra` SET `alamat` = '$alamat', `kota` = '$kota', `no_ktp` = '$no_ktp', `nopegawai` = '$nopegawai', `nama_mitra` = '$nama_mitra', `foto_mitra` = '$picture', `nomorhp` = '$nomorhp', `mitra_email` = '$mitra_email', `mitra_pass` = '$mitra_pass', `dokumen` = '$dokumen', `jabatan` = '$jabatan', `departement` = '$departement', `nopegawai` = '$nopegawai', `lhp` = '$lhp', `opd` = '$opd', `kepegawaian` = '$peg', `exportimport` = '$exp', `administrator` = '$adm' WHERE `mitra`.`id_mitra` = '$id_mitra';");
if($query){
		?>
	<center><script>document.location.href="index.php";</script>
</center>
		<?php
	}else{
		echo mysql_query();
	}
	

}else{
	unset($_POST['submit']);
}
?>
	<meta charset="utf-8" />
	<html>
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo PuUSD se, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
</head>
<body style="padding:25px;"><center>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
						<a href="index.php" style="position:relative;left:0;float: left;color:red" onclick="javascript:showDiv();"><img src="../backblack.png"width="25px"/> Cancel and Back</i></a><br>
                                <h4 class="title">Update Data Administrator</h4>
                              </div><br><br>
                            <div class="content table-responsive table-full-width">
                                

     <form id="form"action="update.php" enctype="multipart/form-data"  method="post" name="postform">
<table style="width:100%;">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
 <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin10'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:20px;width:100%"type="text" value="<?php echo $row['nopegawai'];?>" name="nopegawai"></td>
  <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;">Gender</td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;">
	<input style="padding:10px;width:100%"type="text" value="<?php echo $row['kelamin'];?>" disabled>
	</td>  </tr>
  <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin11'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="text" value="<?php echo $row['nama_mitra'];?>" name="nama_mitra"required="required"></td>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin16'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="number" value="<?php echo $row['no_ktp'];?>"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin12'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="text" placeholder="Jabatan" name="jabatan"required="required"></td>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin8'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="text" placeholder="Departemen/instansi" name="departement"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin13'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="text" value="<?php echo $row['alamat'];?>" name="alamat"required="required"></td>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin23'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="text" value="<?php echo $row['kota'];?>" name="kota"required="required"></td>
  </tr>  
    <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin14'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%" value="<?php echo $row['nomorhp'];?>" type="number" name="nomorhp"required="required"></td>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;">Email</td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%"type="email" value="<?php echo $row['mitra_email'];?>" name="mitra_email"required="required"></td>
  </tr>
  </tr>
      <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;"><?php echo $set['admin15'];?></td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;">
	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="picture" size="999999" required >
	<input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="hidden" name="sicture" value="<?php echo $row['picture'];?>">
</td>

	<td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;">Passsword</td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="padding:10px;width:100%" placeholder="Password" type="password" name="upass"required="required"></td>
  </tr>
  <tr>
    <td style="padding:10px;background:#f3f3f3;border: 2px solid #fff;">Scan ID Document</td>
    <td style="background: #f3f3f3;padding: 10px;border: 2px solid #fff;"><input style="border:1px solid grey;padding:10px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="dokumen" size="999999"></td>
    <td colspan="2"style="padding:10px;background:#f3f3f3;border: 2px solid #fff;">
	<div style="position:relative;color:#444;padding:15px;background-color:#ececec"><center style="font-size:12px"> <?php echo $set['admin17'];?></center></div>
<center><select style="padding:10px;width:100%" name="sebagai"required=required>
<option name="sebagai" value="">-Select Administrator Type-</option>
		  	  <?php
	if($rows['sebagai']=='superuser')
      {
	?> 	
	  <option name="sebagai"value="superuser">Super User</option>
	<option name="sebagai"value="am">Account Manager</option>
	<option name="sebagai"value="admin">Admin</option>
	  		  	 
	  <?php } ?>
 <?php
	if($rows['sebagai']=='pm')
      {
	?> 
	<option name="sebagai"value="teamleader">Team Leader</option>
	<option name="sebagai"value="am">Account Manager</option>
	<option name="sebagai"value="admin">Admin</option>
	  <?php } ?>
	   <?php
	if($rows['sebagai']=='teamleader')
      {
	?> 
	<option name="sebagai"value="am">Account Manager</option>
	<option name="sebagai"value="admin">Admin</option>
	  <?php } ?>
	  	   <?php
	if($rows['sebagai']=='am')
      {
	?> 
	<option name="sebagai"value="admin">Admin</option>
	  <?php } ?>
	  	  	   <?php
	if($rows['sebagai']=='admin')
      {
	?> 
	<option name="sebagai"value="admin">Admin</option>
	  <?php } ?>
</select></center>
<style>
.flipswitch {
  position: relative;
  background: white;
  width: 120px;
  height: 40px;
  -webkit-appearance: initial;
  border-radius: 3px;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  outline: none;
  font-size: 14px;
  font-family: Trebuchet, Arial, sans-serif;
  font-weight: bold;
  cursor: pointer;
  border: 1px solid #ddd;
}

.flipswitch:after {
  position: absolute;
  top: 5%;
  display: block;
  line-height: 32px;
  width: 45%;
  height: 90%;
  background: #fff;
  box-sizing: border-box;
  text-align: center;
  transition: all 0.3s ease-in 0s;
  color: black;
  border: #888 1px solid;
  border-radius: 3px;
}

.flipswitch:after {
  left: 2%;
  content: "No";
}

.flipswitch:checked:after {
  left: 53%;
  content: "Yes";
  background: #41fd41;
}
</style> 
<div class="btn btn-info btn-lg" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px"><table width="100%" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px" ><tr><td width="70%"><label id="*spaM4" for="product"><?php echo $set['admin18'];?></label></td><td width="30%"><input name="laporan" value="yes" type="checkbox" id="choice" class="flipswitch" onclick="totalIt()" checked="checked"/></td></tr></table></div><br>
<div class="btn btn-info btn-lg" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px"><table width="100%" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px" ><tr><td width="70%"><label id="*spaMa" for="product"><?php echo $set['admin19'];?></label></td><td width="30%"><input name="exportimport" value="yes" id="choice" type="checkbox" class="flipswitch" onclick="totalIt()"/></td></tr></table></div><br>
<div class="btn btn-info btn-lg" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px"><table width="100%" style="background:none;border-radius:0px;color:#444;z-index:9999;width:100%;height:auto;font-size:14px" ><tr><td width="70%"><label id="*spaMs" for="product">Data Administrator</label></td><td width="30%"><input name="administrator" value="yes" type="checkbox" class="flipswitch" id="choice" onclick="totalIt()" /></td></tr></table></div><br>
	<small>** <?php echo $set['admin21'];?><small> </td></tr>
</table>
<center>
<button type="submit" name="submit" class="btn btn-info btn-lg" style="background-color:#09c;color:#fff;z-index:9999;width:80%;height:70px" data-color="blue">Save<br></button><br>
</center>
<br><br><br>
	</form>
                            </div>
                        </div>
                    </div>


                 

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> rentopos
                </p>
            </div>
        </footer>


</div>
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo puUSD se -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>
</center>

</html>
