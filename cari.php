<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<p style="color:#444">
<?php 
include "dbconnect.php";
$r=$_POST['r'];
$query=mysqli_query($mysqli,"select * from mitra where nama_mitra like '%".$r."%' LIMIT 5");
$row=mysqli_num_rows($query);
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	while ($data=mysqli_fetch_array($query)) // perulangna untuk menampilkan data
	{
		// menampilkan data dalam bentuk table
		echo "<table width='100%' style='width:100%;margin-top:0;background:#fff;color:#000;border-bottom:1px solid #dcdcdc;font-size:14px;padding:4px;'>
				<tr width='100%'>";?>
    				<?php echo "<td 'width=100%'><div id='dam_return' style='text-decoration: none !important;'><a onclick='javascript:showBiv()' href='#' style='color:#000;text-decoration: none !important;'>".$data['nama_mitra']."</a></div></td>
				</tr>
			</table>";	
	}
}
else // jika data tidak ditemukan
{
	echo "<br><br><center style=color:#000;><strong>Not Found, Add from administrator menu</strong></center>";	
}
?></p>
<script>$(document).ready(function(){
	$("#dam_return a").click(function(){
		var value = $(this).html();
        var input = $('#golek');
        input.val(value);
	});
});</script>
<script type="text/javascript">function showBiv(){div=document.getElementById("jesil");div.style.display="none"};</script>