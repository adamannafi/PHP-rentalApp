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
<?php
//including the database connection file
include_once("../dbconnect.php");	
$kang=mysqli_query($mysqli, "SELECT * from info where idinfo='1'");
	$info=mysqli_fetch_array($kang);
	$nas=mysqli_query($mysqli, "SELECT * from settinglang where status='Default'");
	$lang=mysqli_fetch_array($nas);
	$activelang=$lang['nameset'];
	$sd=mysqli_query($mysqli, "SELECT * from language where namelang='$activelang'");
	$set=mysqli_fetch_array($sd);

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM mitra ORDER BY id_mitra Asc");
?>
<div class="wrapper">
 
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Administrator</h4>
                              </div><br><br>
                            <div class="content table-responsive table-full-width">
                                
<table class="table table-bordered" style="font-size:12px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
<th >Photo</th>
		<th >Profile</th>
		<th >date registration</th>
		<th >Adress</th>
		<th >Register as</th>	
		<th >Office</th>	
	
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
		echo "<td width=15%><b>".$res['title']." ".$res['nama_mitra']."  (".$res['kelamin'].")</b><br>".$res['mitra_email']."<br>Phone: ".$res['nomorhp']." <br>ID Nationality: ".$res['no_ktp']."<br>ID Employee: ".$res['nopegawai']."</td>";
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
  if($res['sebagai']=='superuser')
      {
  if($res['suspen']=='1')
      {
	
		echo "<small style=color:red>SUSPENSED</small><br><br>";	
  }
	  
  if($res['suspen']=='0')
      {
echo "<small style=color:green>ACTIVE</small><br><br>";
  }
	  }
  echo "</td>";
  echo "<td width=5%>".$res['jabatan']."-".$res['departement']."</td>";	

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

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <?php echo $info['namaapp'];?>
                </p>
            </div>
        </footer>


</div>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "paging": false // false to disable pagination (or any other option)
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<div id="editor"></div>
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo puUSD se -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>
</center>

</html>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
