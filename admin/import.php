<?php
error_reporting(0);
include 'connect.php';
include 'excel_reader2.php';

if(isset($_POST['import'])) {

	$data = new Spreadsheet_Excel_Reader($_FILES['import']['tmp_name']);
	$baris = $data->rowcount($sheet_index=0);

	$drop = isset($_POST['drop'])?$_POST['drop'] : 0;
	if($drop == 1) {
		mysqli_query($connect, "TRUNCATE TABLE billingrate");
	}

	for($i = 2;$i<=$baris; $i++) {
		$date = $data->val($i, 1);
		$time = $data->val($i, 2);
		$callerid = $data->val($i, 3);
		$destination = $data->val($i, 4);
		$description = $data->val($i, 5);
		$durationsecond = $data->val($i, 6);
		$account = $data->val($i, 7);
		$pic = $data->val($i, 8);
		$harga = $data->val($i, 9);
		$tipelayanan = $data->val($i, 10);
		$nameservice = $data->val($i, 11);

		mysqli_query($connect, "INSERT INTO billingrate SET date = '$date', time = '$time', callerid = '$callerid', destination = '$destination', description = '$description', durationsecond = '$durationsecond', account = '$account', pic = '$pic', harga = '$harga', tipelayanan = '$tipelayanan', nameservice = '$nameservice'");
	}
	unlink($_FILES['import']['tmp_name']);
	echo "<meta http-equiv='refresh' content='1; url=index.php'>";

}

?>