<?php
session_start();
include_once 'dbconnect.php';
	$kang=mysqli_query($mysqli, "SELECT * from info where idinfo='1'");
	$info=mysqli_fetch_array($kang);
	$nas=mysqli_query($mysqli, "SELECT * from settinglang where status='Default'");
	$lang=mysqli_fetch_array($nas);
	$activelang=$lang['nameset'];
	$sd=mysqli_query($mysqli, "SELECT * from language where namelang='$activelang'");
	$set=mysqli_fetch_array($sd);
if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Web portal - <?php echo $info['namaapp']?>
  </title>
  <!-- Favicon -->
	<link rel="icon" href="<?php echo $info['logo']?>" type="image/png" sizes="16x16">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<link rel="stylesheet" href="w8.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#sim").click(function(){
    $("#sidenav-main").remove();
  });
  
});
</script>
</head>
<style>
div{pointer-events:auto;border:none;border-color:none}
.div:hover {
  background-color: hsla(0, 100%, 100%, 0.0); border:none;border-color:none
}
a:hover
{   
  text-decoration: none;
}
.content {display:none;}
.preload {position:fixed;left:0;right:0;z-index:99999;
background-color:#ffffff7d;height:100%;background-position:center;background-repeat:no-repeat;background-size:cover;
}
</style>
<script>
$(function() {
    $(".preload").fadeOut(500, function() {
        $(".content").fadeIn(500);        
    });
});
</script>
<div class="preload"><center><img style="margin-top:100px;width:160px;" src="agen.png"><br><br><img style="margin-top:100px;width:60px;" src="interwind.svg"><br><br><small style="color:#444;padding:20px;"><?php echo $set['memuat'];?></small></center>
</div>

<script>
function changeSource(){
$("#myIframe").attr("src","transaction/main.php");
}
function khangeSource(){
$("#myJframe").attr("src","item/index.php");
}

function HhangeSource(){
$("#myGframe").attr("src","transaction/index.php");
}
</script>
<body class="">
      <div id="content" class="content">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" style="background: linear-gradient(107deg, rgb(255 141 141 / 32%) 10%, rgb(242 245 247) 86%, rgb(39 101 154 / 64%) 100%);" id="sidenav-main">
 
    <div class="container-fluid" style="verflow: auto;">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
			  			<?php 
	if($rows['sebagai']=='superuser')
      {
	?>  
        <img src="admin.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h4><small>SUPER USER</small></h4>
	<?php } ?>
					  			<?php 
	if($rows['sebagai']=='pm')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h4><small>PROJECT MANAGER</small></h4>
	<?php } ?>
				  			<?php 
	if($rows['sebagai']=='admin')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h4><small>ADMIN</small></h4>
	<?php } ?>
					  			<?php 
	if($rows['sebagai']=='am')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h4><small>ACCOUNT MANAGER</small></h4>
	<?php } ?>
              </a>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
				<?php
if($rows['foto_mitra']==''){
	?>
<img src="user.png"/>
	  <?php } else {?>
	  <img src="foto_mitra/<?php echo $rows['foto_mitra'];?>"/>
	<?php }
	?>
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Setting Account</h6>
            </div>
         <a onclick="openCity(event,'pic')" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span><?php echo $set['dash1']?></span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="logoutadmin.php?logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
			  			<?php 
	if($rows['sebagai']=='superuser')
      {
	?>  
        <img src="admin.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>SUPER ADMIN</h3>
	<?php } ?>
				  			<?php 
	if($rows['sebagai']=='admin')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>ADMIN</h3>
	<?php } ?>
					  			<?php 
	if($rows['sebagai']=='am')
      {
	?>  
        <img src="agen.png" style="max-width:100px;max-height:auto" class="navbar-brand-img" alt="..."><br><h3>ACCOUNT MANAGER</h3>
	<?php } ?>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">

          <li class="nav-item  active ">
            <a class="nav-link  active " onclick="openCity(event,'home')" id="defaultOpen">
              <i class="ni ni-tv-2 text-primary"></i> <?php echo $set['dash3']?>
            </a>
          </li>
	
		  <?php 
	if($rows['laporan']=='yes')
      {
	?> 	  
          <li class="nav-item">
            <a href="javascript:HhangeSource();" id="refresh" class="nav-link " onclick="openCity(event,'piutang')">
              <i class="ni ni-folder-17 text-green"></i> <?php echo $set['dash4']?>
            </a>
          </li>
	  <?php }?>
	  	  	<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'kembali')">
              <i class="ni ni-folder-17 text-orange"></i> <?php echo $set['dash5']?>
            </a>
          </li>
<?php	if($rows['exportimport']=='yes')
      {
	?> 	  
		  <li class="nav-item">
            <a href="javascript:khangeSource();" class="nav-link" onclick="openCity(event,'item')">
              <i class="ni ni-app text-orange"></i> <?php echo $set['dash6']?>
            </a>
          </li>

		  <li class="nav-item">
            <a href="javascript:changeSource();" id="refresh" class="nav-link " onclick="openCity(event,'export')">
              <i class="ni ni-bullet-list-67 text-default"></i> <?php echo $set['dash7']?>
            </a></li>
	  <?php } ?>
		  <li class="nav-item">
            <a href="javascript:changeSource();" id="refresh" class="nav-link " onclick="openCity(event,'jadwal')">
              <i class="ni ni-calendar-grid-58 text-default"></i> <?php echo $set['dash8']?>
            </a></li>
		  	<li class="nav-item">
            <a class="nav-link " onclick="openCity(event,'notification')">
              <i class="ni ni-send text-dark"></i> <?php echo $set['dash9']?>
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'pic')">
              <i class="ni ni-circle-08 text-blue"></i> <?php echo $set['dash10']?>
            </a>
          </li>		
		  		  	<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'setting')">
              <i class="ni ni-settings-gear-65 text-blue"></i> Settings
            </a>
          </li>
		  	  <?php 
	if($rows['administrator']=='yes')
      {
	?> 
		  			<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'admin')">
              <i class="ni ni-single-02 text-orange"></i> Administrators
            </a>
          </li>
	  <?php }
	?> 	

		  	<li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'customer')">
              <i class="ni ni-single-02 text-green"></i> Member Area
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" onclick="openCity(event,'discount')">
              <i class="ni ni-scissors text-green"></i> Discount
            </a>
          </li>
		  		  	  <?php
	if($rows['sebagai']=='superuser')
      {
	?> 	
		<li class="nav-item">
            <a class="nav-link" target="_blank" href="adminer.php">
              <i class="ni ni-building text-red"></i> Database SqL
            </a>
          </li>
		  		<li class="nav-item">
            <a class="nav-link" target="_blank" href="https://rentopos.com/cpanel">
              <i class="ni ni-app text-blue"></i> Cpanel Hosting
            </a>
          </li>
	  <?php } ?>
          <li class="nav-item">
            <a class="nav-link " href="logoutadmin.php?logout">
              <i class="ni ni-user-run text-red"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
      </div>
    </div>
	
  </nav>
  <div class="main-content">
    <!-- Navbar -->

	<div class="w3-container w3-center w3-animate-top" id="beda">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" style="background:#afc2d9;border-radius: 0 0 35px 0;border-bottom: 3px solid #f2f5f7;">
      <div class="container-fluid" style="color:#fff">
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script><link rel="stylesheet" href="w3.css">
        <a href="dashboard.php" class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" ><div style="color:#fff"><img src="logo.png" width="50px"/ > <?php echo $info['namaapp']?></div></a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" style="color:rgb(226, 226, 226);" >
          <div class="form-group mb-0" >
            <div class="input-group input-group-alternative" style="border-color:#fff;color:#fff">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
<?php include "dbconnect.php";?>
<script type="text/javascript">/*<![CDATA[*/$(document).ready(function(){$("#golek").keyup(function(){var a=$("#golek").val();if(a!=""){$("#jesil").html("<img width=300px src='loading.gif'/>");$.ajax({type:"post",url:"cari.php",data:"r="+a,success:function(b){$("#jesil").html(b)}})}})});/*]]>*/</script>            
<input class="form-control" style="background:none" id="golek" placeholder="Search Admin name" type="text">
<div style="width: 100%;border: 0px;border-radius: 40px;color:#796d6d" id="jesil"></div>
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
				<?php
if($rows['foto_mitra']==''){
	?>
<img src="user.png"/>
	  <?php } else {?>
	  <img src="foto_mitra/<?php echo $rows['foto_mitra'];?>"/>
	<?php }
	?>
                </span>
                <div style="color: #796d6d" class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold" style="color:#fff">
				 <?php echo $rows['nama_mitra'];?>
				  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Setting Profile</h6>
              </div>
              <a onclick="openCity(event,'pic')" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span><?php echo $set['dash1']?></span>
              </a>
			<div  class="dropdown-item" id="sim">
                <i class="ni ni-settings-gear-65"></i>
                <span><?php echo $set['dash2']?></span>
              </div>
              <div class="dropdown-divider"></div>
              <a href="logoutadmin.php?logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
	</div>
    <!-- End Navbar -->
	<div id="home" class="mainpanel">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8" style="background:linear-gradient(87deg, #ffe4bd 0, #a3b4c5c4 100%) !important">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats --><br><br><br>
		  
	<div class="w3-container w3-center w3-animate-right" id="beda">
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Administrator</h5>
                      <span class="h2 font-weight-bold mb-0"><?php
$query = "SELECT COUNT(*) AS total FROM mitra";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-circle-08"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash11']?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $set['dash12']?></h5>
                      <span class="h2 font-weight-bold mb-0"><?php
$query = "SELECT COUNT(*) AS total FROM product where status='rented'";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash12']?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $set['dash13']?></h5>
                      <span class="h2 font-weight-bold mb-0"><?php
$query = "SELECT COUNT(*) AS total FROM product where status='available'";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
echo $num_rows;
 ?> </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash14']?></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
		  </div>
         </div>
      </div>
    </div>
	
	<div class="w3-container w3-center w3-animate-bottom" id="beda">
    <div class="container-fluid mt--7">
      <div class="row">
<div class="col-xl-12 mb-5 mb-xl-0">
<div class="card shadow border-0">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div style="color:#444" class="col">
                  <h6 style="color:#444 !important" class="text-uppercase text-light ls-1 mb-1">Dashboard</h6>
                  <h2 style="color:#444 !important" class="text-white mb-0"><small><?php echo $set['dash15']?> </small></h2>
                </div>
				<div class="col">
<?php echo $set['dash16']?> <?php echo date('Y'); ?>: <b><?php echo $info['currency']?> <?php
$query = "SELECT SUM(hargadiskon) AS total FROM `sewa` WHERE YEAR(tanggal) = YEAR(NOW( ))"; 
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$lam = "SELECT COUNT(*) AS nok FROM `sewa` WHERE YEAR(tanggal) = YEAR(NOW( ))"; 
$asas = mysqli_query($mysqli, $lam); 
$aak = mysqli_fetch_assoc($asas); 
$jemah = $aak['nok']; 
$perawat = number_format($num_rows,0,",","."); echo $perawat;
 ?> <br><small>(<?php echo $jemah;?> transaction)</small></b>
  <script type="text/javascript">
 $(document).ready(function() {
        loadData();
    });

    var loadData = function() {
        $.ajax({    //create an ajax request to load_page.php
            type: "GET",
            url: "meleck.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer").html(response);
                setTimeout(loadData, 5000); 
            }

        });
    };

</script>

<div id="responsecontainer" align="center"></div>
				<noscript>
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0"  >
                      <a target="_blank" style="background:#499c49;color:#fff" href="exportall.php" class="nav-link py-2 px-3 active">
                        <span class="d-none d-md-block">Excel</span>
                      </a>
                    </li>
                    <li class="nav-item" >
                      <a target="_blank" style="background:#ef4747;color:#fff" href="all.php" class="nav-link py-2 px-3">
                        <span class="d-none d-md-block">PDF</span>
                      </a>
                    </li>
                  </ul>
				</noscript>
                </div>
              </div>
            </div>

  <div class="container">

  <?php
  $tahun=date("Y");
  $total = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa where YEAR(tanggal)='$tahun'");
  $data = mysqli_fetch_row($total);
  $totalall = $data[0];

  $hasil1 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun'");
  $data1 = mysqli_fetch_row($hasil1);
  $jumlah1 = $data1[0];


  $hasil2 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun'");
  $data2 = mysqli_fetch_row($hasil2);
  $jumlah2 = $data2[0];


  $hasil3 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun'");
  $data3 = mysqli_fetch_row($hasil3);
  $jumlah3 = $data3[0];


  $hasil4 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun'");
  $data4 = mysqli_fetch_row($hasil4);
  $jumlah4 = $data4[0];


  $hasil5 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun'");
  $data5 = mysqli_fetch_row($hasil5);
  $jumlah5 = $data5[0];


  $hasil6 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun'");
  $data6 = mysqli_fetch_row($hasil6);
  $jumlah6 = $data6[0];


  $hasil7 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun'");
  $data7 = mysqli_fetch_row($hasil7);
  $jumlah7 = $data7[0];


  $hasil8 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun'");
  $data8 = mysqli_fetch_row($hasil8);
  $jumlah8 = $data8[0];


  $hasil9 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun'");
  $data9 = mysqli_fetch_row($hasil9);
  $jumlah9 = $data9[0];


  $hasil10 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun'");
  $data10 = mysqli_fetch_row($hasil10);
  $jumlah10 = $data10[0];

  $hasil11 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun'");
  $data11 = mysqli_fetch_row($hasil11);
  $jumlah11 = $data11[0];


  $hasil12 = mysqli_query($mysqli,"SELECT count(*) as jum FROM sewa WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun'");
  $data12 = mysqli_fetch_row($hasil12);
  $jumlah12 = $data12[0];

  ?>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Transaction'],
        ['Jan',  <?php echo $jumlah1 = $data1[0]; ?>],
        ['Feb',  <?php echo $jumlah2 = $data2[0]; ?>],
        ['Mar',  <?php echo $jumlah3 = $data3[0]; ?>],
        ['Apr',  <?php echo $jumlah4 = $data4[0]; ?>],
        ['Mei',  <?php echo $jumlah5 = $data5[0]; ?>],
        ['Jun',  <?php echo $jumlah6 = $data6[0]; ?>],
        ['Jul',  <?php echo $jumlah7 = $data7[0]; ?>],
        ['Aug',  <?php echo $jumlah8 = $data8[0]; ?>],
        ['Sep',  <?php echo $jumlah9 = $data9[0]; ?>],
        ['Oct',  <?php echo $jumlah10 = $data10[0]; ?>],
        ['Nov',  <?php echo $jumlah11 = $data11[0]; ?>],
        ['Dec',  <?php echo $jumlah12 = $data12[0]; ?>]
        ]);

      var options = {
        curveType: 'function',
        legend: { position: 'bottom' }
      };
      
    //css 
    options.chartArea = { left: '10%', top: '5%', width: "100%", height: "80%" };
    
        //create trigger to resizeEnd event     
        $(window).resize(function() {
          if(this.resizeTO) clearTimeout(this.resizeTO);
          this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
          }, 500);
        });

//redraw graph when window resize is completed  
$(window).on('resizeEnd', function() {
  drawChart(data);
});
//end

var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

chart.draw(data, options);
}
</script>

  <br /><br />
  <div class="container">
<br />
<form method="post">
 <div class="form-group">
   <div id="curve_chart" style="width: 800px; height: 300px"></div>
 </div>
</form>

</div><br><br></div>
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $set['dash17']?></h5>
                      <span class="h4 font-weight-bold mb-0"><?php
$query = "SELECT sum(hargadiskon) AS total FROM `sewa`";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$perawat = number_format($num_rows,0,",","."); echo $perawat;
 ?>,-</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash18']?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $set['dash19']?></h5>
                      <span class="h4 font-weight-bold mb-0"> <?php
$query = "SELECT sum(hargadiskon) AS total FROM `sewa` WHERE YEAR(tanggal) = YEAR(NOW( )) and MONTH(tanggal) = MONTH(NOW( )) and DAY(tanggal) = DAY(NOW( ))";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$perawat = number_format($num_rows,0,",","."); echo $perawat;
 ?>,-</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash20']?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $set['dash21']?></h5>
                      <span class="h4 font-weight-bold mb-0"><?php
$query = "SELECT sum(hargadiskon) AS total FROM `sewa` WHERE YEAR(tanggal) = YEAR(NOW( )) and MONTH(tanggal) = MONTH(NOW( ))";  
$result = mysqli_query($mysqli, $query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$perawat = number_format($num_rows,0,",","."); echo $perawat;
 ?>,- </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><?php echo $set['dash22']?></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
<link href="assets/bootstrap.min.css" rel="stylesheet">

    <link href="assets/datatables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="assets/jquery.datatables.min.js"></script>

    <script src="assets/datatables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>
</div>
      </div>
      
	  <br><br>
 
	  <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; <?php echo date('Y');?> <?php echo $info['namaapp']?>
            </div>
          </div>
        </div>
      </footer>
    </div>
	</div>
  </div>

<div id="piutang" class="mainpanel">
<br><br>
<iframe src="transaction/index.php" id="myGframe" style="width:100%;height:725px;overflow:auto;margin-top:-80px;" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="export" class="mainpanel">
<br><br>
<iframe src="transaction/main.php" id="myIframe" style="width:100%;height:725px;overflow:auto;margin-top:-80px;" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="jadwal" class="mainpanel">
<br><br>
<iframe src="item/jadwalbarang.php" style="width:100%;height:725px;overflow:auto;margin-top:60px;" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="pic" class="mainpanel">
<br><br>
<iframe src="pic/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="admin" class="mainpanel">
<br><br>
<iframe src="admin/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="item" class="mainpanel">
<br><br>
<iframe src="item/index.php" id="myJframe" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="kembali" class="mainpanel">
<br><br>
<iframe src="transaction/kembali.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="setting" class="mainpanel">
<iframe src="transaction/updateinfo.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="customer" class="mainpanel">
<iframe src="transaction/customer.php" style="width:100%;height:725px;overflow:auto;" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="discount" class="mainpanel">
<iframe src="discount/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>
<div id="notification" class="mainpanel">
<br><br>
<iframe name="notification" src="notification/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>

<div id="user" class="mainpanel">
<br><br>
<iframe name="user" src="users/index.php" style="width:100%;height:725px;overflow:auto;margin-top:40px" align="center" scrolling="yes" frameborder="0"></iframe>
</div>

<script>/*<![CDATA[*/function openCity(b,c){var e,a,d;a=document.getElementsByClassName("mainpanel");for(e=0;e<a.length;e++){a[e].style.display="none"}d=document.getElementsByClassName("tablinks");for(e=0;e<d.length;e++){d[e].className=d[e].className.replace(" active","")}document.getElementById(c).style.display="block";b.currentTarget.className+=" active"}document.getElementById("defaultOpen").click();/*]]>*/</script>

  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO4lbxY6SKygcJxTuzu-Qi7kAAP9SdAwM"></script>
	</div>
</body>

</html>