<?php
//including the database connection file
include_once("../dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users order by pembelian DESC");
?>
<link rel="stylesheet"type="text/css"href="../button.css"/>
<html>
<body>
<table width="100%;background:#fff"><tr>
<td style="color: #444;border-right:none;background:none">
<h3>Ranking User Saat ini</h3>
Urutan Ranking berdasarkan total belanja tertinggi. <br>** Untuk Update Ranking dan update level user klik tombol Upgrade Level
</td>
<td style="border-right:none;background:none">
<center><a href="location.reload();" target="_blank"><div style="background:green;width:200px" class="testbutton"><small>Refresh Ranking</small></div></a>
</center></td>
</tr></table>
	<table width='100%' border=0>
	<tr>
		<th>Ranking</th>
		<th>Nama User</th>
		<th>Email</th>
		<th>Nomor Handphone</th>
		<th>Tipe User</th>
<th>Total Belanja Lunas</th>
<th>Jumlah Saldo</th>
<th>Upgrade Level</th>
	
	</tr>
	<?php 
$counter = 0; 
	while($res = mysqli_fetch_array($result)) { 		
$counter++; 
		echo "<tr>";
		echo "<td><center><b>".$counter."</b></center></td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['tipeuser']."</td>";
echo "<td width=15%>";?>
USD  <?php

$id_users=$res['id'];
$sumr = "SELECT sum(total) AS total FROM transaksi where id_users='$id_users' and status_trans='finish' and lunas='yes'"; 
$pipu = mysqli_query($mysqli, $sumr); 
$pakuon = mysqli_fetch_assoc($pipu); 
$num_rows = $pakuon['total']; 
$laba = number_format($num_rows,0,",",".");
echo $laba;
 ?> 
<?php echo "</td>";
echo "<td width=15%>";?>
USD  <?php
$jumro = $res['saldo']; 
$utang = number_format($jumro,0,",",".");
echo $utang;
 ?> 
<?php echo "</td>";
echo "<td width=15%>";?>
--
<?php echo "</td>";
		}
	
	?>
	</table>
</body>
</html>
