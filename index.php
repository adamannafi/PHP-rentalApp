 <?php
ob_start();
session_start();
if(!file_exists('dbconnect.php')){
	header('location:install.php');
	die();
}
include_once 'dbconnect.php';
	$kang=mysqli_query($mysqli, "SELECT * from info where idinfo='1'");
	$info=mysqli_fetch_array($kang);
	$nas=mysqli_query($mysqli, "SELECT * from settinglang where status='Default'");
	$lang=mysqli_fetch_array($nas);
	$activelang=$lang['nameset'];
	$sd=mysqli_query($mysqli, "SELECT * from language where namelang='$activelang'");
	$set=mysqli_fetch_array($sd);
if(isset($_POST['btn-login']))
{
	$mitra_email = mysqli_real_escape_string($mysqli, $_POST['mitra_email']);
	$mitra_pass = mysqli_real_escape_string($mysqli, $_POST['mitra_pass']);
	$mitra_email = trim($mitra_email);
	$mitra_pass = trim($mitra_pass);
	$res=mysqli_query($mysqli, "SELECT id_mitra, mitra_email, mitra_pass FROM mitra WHERE mitra_email='$mitra_email'");
	$row=mysqli_fetch_array($res);
	$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
	if($count == 1 && $row['mitra_pass']==md5($mitra_pass))
	{
		$_SESSION['mitra'] = $row['id_mitra'];?>
		<script>document.location.href="dashboard.php";</script>
		<?php }
	else
	{
		?>
<style>#hideme{-webkit-animation:cssAnimation 15s forwards;animation:cssAnimation 15s forwards}@keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}@-webkit-keyframes cssAnimation{0%{opacity:1}90%{opacity:1}100%{opacity:0}}</style>
<div id="hideme"style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)"><center>Email or password is wrong...
<br><br>
<br><center><b><a href="index.php">SignIn Again</a></b></center>
</div>
		<?php
	}
	
}

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
	<link rel="icon" href="fotobarang/<?php echo $info['logo']?>" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form - <?php echo $info['namaapp']?></title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="sign-in-form" method="post">
<h3 class="title">Sign in</h3>
			<img src="fotobarang/<?php echo $info['picture']?>" width="280px"/ ><br>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="mitra_email" placeholder="<?php echo $set['loginemail']?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="mitra_pass" placeholder="<?php echo $set['loginpass']?>" />
            </div>
            <input type="submit" value="<?php echo $set['buttonsign']?>" name="btn-login" class="btn solid" /><br><br>
            	<center><a style="color:#333;font-decoration:none" href="reset/forgot.php">Forgot Password? <small>Please Reset</small></a></center>
			</form>

          <form action="#" class="sign-up-form">
<center><?php echo $set['haveno']?></center>
           
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>First Time Here ?</h3>
            <p>
<?php echo $set['loginsocial']?>
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="point.png" style="width:250px" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Registered ?</h3>
            <p>
              Come on in, don't forget your username and password. It may be fun but still safe.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
