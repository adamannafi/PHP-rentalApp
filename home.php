<?php
$session_lifetime = 3600 * 24 * 860; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['mitra']))
{
	header("Location: index.php");
}
$res=mysqli_query($mysqli, "SELECT * FROM mitra WHERE id_mitra=".$_SESSION['mitra']);
$rows=mysqli_fetch_array($res);
 if($rows['sebagai']=='Admin'&&$rows['suspen']=='0')
      {
	header("Location: dashboard.php");	  
	  }
	if($rows['sebagai']=='sales'&&$rows['suspen']=='0')
      {
	header("Location: dashboard.php");	  
	  }  	
	  if($rows['sebagai']=='superadmin')
      {
	header("Location: dashboard.php");	  
	  } 
	if($rows['sebagai']=='it'&&$rows['suspen']=='0')
      {
	header("Location: dashboard.php");	  
	  } 
	  if($rows['sebagai']=='customerservice'&&$rows['suspen']=='0')
      {
	header("Location: dashboard.php#dashboard");	  
	  }else{
		  echo "Sorry You are suspensed By administrator. Please Contact administrator for verification";
	  }
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<style>
.lds-dual-ring {
  display: inline-block;
  width: 64px;
  height: 64px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 46px;
  height: 46px;
  margin: 1px;
  border-radius: 50%;
  border: 5px solid #09C;
  border-color: #09C transparent #09C transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style><center>
<div class="lds-dual-ring"></div></center>