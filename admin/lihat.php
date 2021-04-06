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
<body style="padding:25px;"onload="window.print()"><center>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
						     <h4 class="title">Profile <?php echo $row['nama_mitra'];?></h4>
                              </div><br><br>
                            <div class="content table-responsive table-full-width">
                                

     <form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table style="width:100%;">
  <tr style="padding:10px">
    <th colspan="4" style="padding:10px"></th>
  </tr>
  <tr>
 <td style="padding:10px;">ID Employee</td>
    <td style="">: <?php echo $row['nopegawai'];?></td>
  
  <td style="padding:10px;">Gender</td>
    <td style="">: <?php echo $row['kelamin'];?>
	</td>  </tr>
  <tr>
    <td style="padding:10px;">Full Name</td>
    <td style="">: <?php echo $row['nama_mitra'];?></td>
    <td style="padding:10px;">ID Nationality</td>
    <td style="">: <?php echo $row['no_ktp'];?></td>
  </tr>
    <tr>
    <td style="padding:10px;">Position</td>
    <td style="">: <?php echo $row['jabatan'];?>
	</td>
    <td style="padding:10px;">Office</td>
    <td style="">: <?php echo $row['departement'];?>
	</td>
  </tr>  
  <tr>
    <td style="padding:10px;">Address</td><td>: <?php echo $row['alamat'];?></td>
    <td style="padding:10px;">City</td>
    <td style="">: <?php echo $row['kota'];?></td>
  </tr>  
    <tr>
    <td style="padding:10px;">Phone</td>
    <td style="">: <?php echo $row['nomorhp'];?></td>
    <td style="padding:10px;">Email</td>
    <td style="">: <?php echo $row['mitra_email'];?></td>
  </tr>
  </tr>
 
      <tr>

    <td style="padding:10px;">Profile picture:</td>
    <td style=""></td>

    <td style="padding:10px;">Verified Identity Document:</td>
    <td style=""></td>
  </tr>
  <tr>
        <tr>
	<td colspan="2" style="padding:10px;">&nbsp;</td>
  </tr>
    <td colspan="2"style="padding:10px;">
	<center><?php 
if (empty($row['foto_mitra'])) { ?>
<img src="../nopic.png" style="width:100px"/>
<?php }else{ ?>
		<?php
	if($row['foto_mitra']=='0')
      {
		echo "<img width=100px src=../nopic.png> </img>";
		  }
		  else {?>
<img src="../foto_mitra/<?php echo $row['foto_mitra'];?>" style="width:200px"/>
<?php }}?></center></td>
<td colspan="2"style="padding:10px;"><center>
<?php 
if (empty($row['dokumen'])) { ?>
<img src="../nopic.png" style="width:100px"/>
<?php }else{ ?>
		<?php
	if($row['dokumen']=='0')
      {
		echo "<img width=100px src=../nopic.png> </img>";
		  }
		  else {?>
<img src="../foto_mitra/<?php echo $row['dokumen'];?>" style="width:300px"/>
<?php }}?></center>
	</td></tr>
</table>

                            </div>
                        </div>
                    </div>


                 

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <?php echo $info['namaapp'];?>
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
