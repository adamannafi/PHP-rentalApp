<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	alert("sesseion expired!! silahkan login kembali");
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
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
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
<body>
<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
  if($rows['sebagai']=='superuser')
      {
$result = mysqli_query($mysqli, "SELECT * FROM mitra ORDER BY id_mitra Asc");
	  }
	  
  if($rows['sebagai']=='admin')
      {
$result = mysqli_query($mysqli, "SELECT * FROM mitra where id_mitra='".$_SESSION['mitra']."' ORDER BY id_mitra Asc");
	  }
?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $set['admin1'];?></h4>
                                <p class="category"><?php echo $set['admin2'];?></p>
                            </div><br><br>
							<table width="100%;background:#fff;padding:10px;"><tr>
<td width="30%"style="padding:10px;border-right:none;background:none">
<small>
<?php echo $set['admin3'];?>
</small></td>
<td width="30%"style="border-right:none;background:none">
<center><div class="btn btn-info btn-lg" id="myBtn" style="padding:10px;background: linear-gradient(87deg, #49eca1 0, #5b966d 100%) !important;border:none;border-radius:20px;width:80%"><?php echo $set['admin4'];?></div>
</center></td>
<td width="30%"style="border-right:none;background:none">
<center><a href="print.php" class="btn btn-info btn-lg" style="padding:10px;background: linear-gradient(87deg, #49eca1 0, #5b966d 100%) !important;border:none;border-radius:20px;color:#fff;width:80%" target="blank">Print Data</a>
</center></td>

</tr></table><br>
                            <div class="content table-responsive table-full-width">
                                
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
<th >Photo</th>
		<th ><?php echo $set['admin5'];?></th>
		<th ><?php echo $set['admin6'];?></th>
		<th ><?php echo $set['trans23'];?></th>
		<th ><?php echo $set['admin7'];?></th>	
		<th ><?php echo $set['admin8'];?></th>	
<th >Navigation</th>
	
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo"<td width='10%'>";?>
	<?php 
if (empty($res['foto_mitra'])) { ?>
<img src="../nopic.png" style="width:100px"/>
<?php }else{ ?>
		<?php
	if($res['foto_mitra']=='0')
      {
		echo "<img width=100px src=../nopic.png> </img>";
		  }
		  else {?>
<img src="../foto_mitra/<?php echo $res['foto_mitra'];?>" style="width:100px"/>
<?php }}
		echo"</td>";
		echo "<td width=15%><b>".$res['title']." ".$res['nama_mitra']."  (".$res['kelamin'].")</b><br>".$res['mitra_email']."<br>Phone: ".$res['nomorhp']." <br>".$set['admin16'].": ".$res['no_ktp']."<br>".$set['admin10'].": ".$res['nopegawai']."</td>";
		echo "<td width=5%>".$res['tanggal']."</td>";	
		echo "<td width=15%>".$res['alamat']."<br>".$res['kecamatan']."<br>".$res['kota']."<br>".$res['propinsi']."</td>";
					echo "<td width=5%>";

  if($res['sebagai']=='pm')
      {
	
		echo "Project Manager";	
  }
  if($res['sebagai']=='am')
      {
	
		echo "Account Manager";	
  }
  if($res['sebagai']=='teamleader')
      {
	
		echo "Team Leader";	
  }
  if($res['sebagai']=='admin')
      {
	
		echo "Administrator";	
  }
  if($res['sebagai']=='superuser')
      {
	
		echo "Super User<br>";	
  }
  echo "<br>";
  if($rows['sebagai']=='superuser')
      {
  if($res['suspen']=='1')
      {
	
		echo "<small style=color:red>SUSPENSED</small><br><br>
		<a style=padding:5px;color:#fff;background:Orange href=aktifkan.php?id_mitra=$res[id_mitra]>Activated</a>";	
  }
	  
  if($res['suspen']=='0')
      {
echo "<small style=color:green>ACTIVE</small><br><br>
		<a style=padding:5px;color:#fff;background:red href=suspens.php?id_mitra=$res[id_mitra]>SUSPEND</a>";
  }
	  }
  echo "</td>";
  echo "<td width=5%>".$res['jabatan']."-".$res['departement']."</td>";	
		
		echo "<td width=5%>";
if($rows['sebagai']=='superuser')
      {
	if($res['id_mitra']=='1')
      {	 
echo "";
	  }else{
 echo "<a style=padding:5px;color:#fff href=delete.php?id_mitra=$res[id_mitra] onClick=\"return confirm('Are you sure you want to delete?')\"><img src=../delete.png width=25px />Delete</a>";	
	  }}else {
		echo "";
	  }
echo"<br><br>
		<a style=padding:5px;color:#fff  target=_blank href=lihat.php?id_mitra=$res[id_mitra]><img src=../print.png width=25px /></a><br><br>
		<a style=padding:5px;color:#fff; href=update.php?id_mitra=$res[id_mitra]><img src=../edit.png width=25px /></a>"; 
		echo"</td>";
		echo "</tr>";	
		
	}
	?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                 

                </div>
            </div>
        </div>
</div>
  <link href="../assets/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../assets/jquery.datatables.min.js"></script>

    <script src="../assets/datatables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
	<style>
.jodal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #fff;
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.jodal-content {
  position: relative;
  bottom: 0;
  background-color: #fff;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.close {
color: red;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.jodal-header {
  padding: 2px 16px;
  background-color: #fff;
  color: #949292;
}

.jodal-body {padding: 2px 16px;}

.jodal-footer {
  padding: 2px 16px;
  background-color: #fff;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
</style>
<div id="myJodal" class="jodal">

  <!-- Modal content -->
  <div class="jodal-content">
    <div class="jodal-header">
      <span class="close" style="margin: 10px;">&times;</span><br>
      <h2><?php echo $set['admin9'];?> </h2>
    </div> 
    <div class="jodal-body" style="padding:10px">
     <form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
 <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin10'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding: 10px;width:100%;border: 1px solid #09c;border-radius: 25px;"type="text" placeholder="ID" name="nopegawai"></td>
  
  <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;">Gender</td>
    <td style="padding: 10px;border-bottom: 1px solid grey;">
	<select style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%" name="kelamin"required=required>
<option name="kelamin" value="">-Gender-</option>
<option name="kelamin"value="Man">Man</option>
<option name="kelamin"value="Woman">Woman</option>
</select></td>  </tr>
  <tr>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin11'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="text" placeholder="Full Name" name="nama_mitra"required="required"></td>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin16'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="number" placeholder="ID Nationality" name="no_ktp"></td>
  </tr>
  <tr>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin12'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="text" placeholder="Position" name="jabatan"required="required"></td>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin8'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="text" placeholder="Office Departement" name="departement"></td>
  </tr>
  <tr>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin13'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="text" placeholder="Street name, number house or Apartement floor" name="alamat"required="required"></td>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin23'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="text" placeholder="City" name="kota"required="required"></td>
  </tr>  
    <tr>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin14'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%" placeholder="7444...." type="number" name="nomorhp"required="required"></td>
    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;">Email</td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type="email" placeholder="yourmail@email.com" name="mitra_email"required="required"></td>
  </tr>
  </tr>
 
      <tr>
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
<input type="hidden" name="suspen"value="0"/>

    <td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;"><?php echo $set['admin15'];?></td>
    <td style="padding: 10px;border-bottom: 1px solid grey;">

	<input style="border:1px solid grey;padding:10px;border:1px solid #09c;border-radius:25px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="picture" size="999999" ></td>

	<td style="padding:10px;border-bottom: 1px solid grey;font-size:12px;">Passsword</td>
    <td style="padding: 10px;border-bottom: 1px solid grey;"><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%" placeholder="Secret Password" type="password" name="upass"required="required"></td>
  </tr>
  <tr>
    <td width="50%"colspan="2"style="padding:10px;border-bottom: 1px solid grey;font-size:12px;">
	<div style="position:relative;color:#444;padding:15px;font-weight:bold"><center style="font-size:11px"> <?php echo $set['admin17'];?></center></div>
<center><select style="padding:10px;border:1px solid #09c;width:100%" name="sebagai"required=required>
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
</td>
    <td colspan="2" style="padding: 10px;border-bottom: 1px solid grey;">
<center><?php echo $set['admin20'];?><br>
	<input style="border:1px solid grey;padding:10px;border:1px solid #09c;border-radius:25px;width:100%" ID="FileUpload1" onchange="IsFileSelected()" type="file" name="dokumen" size="999999">
	<br>
	<small>** <?php echo $set['admin21'];?><small> 
<br><br>
<input type="hidden" name="tanggal"value="<?php echo date('d-m-Y h:i:s'); ?>"/>
<input type="hidden" name="suspen"value="0"/>
<input type="hidden" name="forgot_pass_identity" value="<?php
function resi(){
$gpass=NULL;
$n = 4; // jumlah karakter yang akan di bentuk.
$chr = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
for($i=0;$i<$n;$i++){
$rIdx = rand(1,strlen($chr));
$gpass .=substr($chr,$rIdx,1);
}return $gpass;};echo resi();?>" />

<div class="jodal-footer">
<button type="submit" name="submit" class="btn btn-info btn-lg" style="z-index:9999;width:80%;height:70px" data-color="blue"><?php echo $set['admin22'];?><br><small>(Ready to Sign in App)</small></button><br>
</center>
<br><br><br>
	</td>
    
</tr>
</table>
<br>
</div>

	</form>
    </div>
  </div>

</div>

<script>
// Get the modal
var jodal = document.getElementById("myJodal");

// Get the button that opens the modal
var div = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
div.onclick = function() {
  jodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  jodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    jodal.style.display = "none";
  }
}
</script>
</html>
<style>#loading{display:block;position:fixed;z-index:9999;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>
<div id="loading" style="display:none"></div>
<script type="text/javascript">function showDiv(){div=document.getElementById("loading");div.style.display="block"}</script>
