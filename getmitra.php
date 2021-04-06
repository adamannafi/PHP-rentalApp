<?php
$con = mysqli_connect('localhost','barisand_bidjobs','OracleCloud1234','barisand_bidjobs');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} 
$sql="SELECT idverifikasi, id_mitra, id_layanan, opsional FROM verifikasijob WHERE opsional=''";
$eful = mysqli_query($con,$sql);
while($yur = mysqli_fetch_array($eful)) {
$kidi=$yur['id_mitra'];
$kufuan="SELECT * FROM users where id='$kidi'";
$yupuan = mysqli_query($con,$kufuan);
$gupuan = mysqli_fetch_array($yupuan);

$katego=$yur['id_layanan'];
$supsup="SELECT * FROM sublayanan where id_sublayanan='$katego'";
$musuan = mysqli_query($con,$supsup);
$lulu = mysqli_fetch_array($musuan);?>
<style>.jontainer{font-family:segoe UI;font-size:14px;width:100%;border-bottom:2px solid #dedede;background-color:yellow;padding:10px;margin:10px 0}.darker{border-color:#ccc;}.jontainer::after{content:"";clear:both;display:table}.jontainer img{float:left;max-width:60px;width:100%;margin-right:20px;border-radius:50%}.jontainer img.right{float:right;margin-left:20px;margin-right:0}.time-right{float:right;color:#aaa}.time-left{float:left;color:#999}</style>
<a target="blank" href="lihat.php?idverifikasi=<?php echo $yur['idverifikasi'];?>">
<div class="jontainer">
<div style="font-family:segoe UI light;color:#444;text-align:left">Partners <?php echo $gupuan['first_name']; ?> <?php echo $gupuan['last_name']; ?> Complete Verification, As <?php echo $lulu['nama_sublayanan']; ?><br>
</div>	</div>
   <?php echo "</td>";
    echo "</tr>";
	
}
mysqli_close($con);
?>