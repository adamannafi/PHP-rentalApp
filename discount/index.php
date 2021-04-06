<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['mitra']))
{
	alert("sesseion expired!! silahkan login kembali");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, OPD-scalable=0' name='viewport' />
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

$result = mysqli_query($mysqli, "SELECT * FROM liburnasional ORDER BY id_liburan Asc");

?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Discount</h4>
                                <p class="category">Add Discount for Selected on Rental Form</p>
                            </div><br><br>
							<table width="100%;background:#fff;padding:10px;"><tr>
<td width="50%%"style="padding:10px;border-right:none;background:none">
<small>
Administrator can add or delete discount
</small></td>
<td width="50%%"style="padding:10px;border-right:none;background:none">
<small>
<div class="btn btn-info btn-lg" id="myBtn" style="padding:10px;background:green;border:none;border-radius:20px;width:80%">Add Discount</div>
</small></td>
</tr></table><br>
                            <div class="content table-responsive table-full-width">
                                
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
		<th >Discount Name</th>
                                    </thead>
<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td width=100%>".$res['keterangan_liburan']." - Discount ".$res['diskon']."%";?>
<a style="float:right;color:#fff;background:#09c;padding:4px;border-radius:6px" href="delete.php?id_liburan=<?php echo $res['id_liburan'];?>">Delete</a><br>		
		<?php echo"</td>";

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
      <span class="close" style="margin: 10px;">&times;</span><br><br><br>
      <h2>Add New Discount</h2>
    </div> 
    <div class="jodal-body" style="padding:10px">
     <form id="form"action="add.php" enctype="multipart/form-data"  method="post" name="postform">

<table width=100%>
<tr>
<td width=25% style=padding:10px>Discount Name</td>
<td width=2% style=padding:10px>:</td>
<td width=73% style=padding:10px><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type=text placeholder="Input Event title or Discount Name" name="keterangan_liburan"required=required></td>
</tr><tr>
<td style=padding:10px>Discount Percent %</td>
<td style=padding:10px>:</td>
<td style=padding:10px><input style="padding:10px;border:1px solid #09c;border-radius:25px;width:100%"type=number placeholder="input number value" name="diskon"required=required></td>
</tr>
<tr>
<td style=padding:10px>&nbsp;</td>
<td style=padding:10px>&nbsp;</td>
<td style=padding:10px>
<center>
<button type="submit" name="submit" class="btn btn-info btn-lg" style="z-index:9999;width:80%;height:70px" data-color="blue">Save</button><br>
</center>
<br><br><br>
</td>
</tr>
</table>

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
