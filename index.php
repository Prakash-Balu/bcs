<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login Panel</title>
<link rel="stylesheet" href="logincss/style.css">
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<section class="container">
  <div>&nbsp;</div>
  <div>&nbsp;</div>
  <div>&nbsp;</div>
  <div align="center" style="color:#FFF; font-size:15px; font-family:'Trebuchet MS'; letter-spacing:1px;"><?php
			if(isset($_GET["status"]))
			{
				$status=$_GET["status"];
			
				if($status=="1")
				{
					echo "Invalid password...!";
				}
				if($status=="2")
				{
					echo "Invalid username...!";
				}
				if($status=="3")
				{
					echo "Logout successfully...!";
				}
				if($status=="4")
				{
					echo "Updated Password successfully...!";
				}
				if($status=="5")
				{
					echo "Password mismatch...!";
				}
				if($status=="6")
				{
					echo "Update password failed...!";
				}
				
			}
			?></div>
  <div>&nbsp;</div>
  <div class="login">
    <h1 style="font-family:'Trebuchet MS';">Login to Application</h1>
    <form method="post" action="checklogin.php">
      <p>
        <input type="text" name="txt_id" value="" placeholder="Username">
      </p>
      <p>
        <input type="password" name="txt_pswd" value="" placeholder="Password">
      </p>
      <p class="submit">
        <input type="submit" name="commit" value="Login" style="cursor:pointer">
      </p>
      <a href="forgotpwd.php" class="btn btn-link">Forgot Your Password?</a>
    </form>
  </div>
</section>
</body>
</html>
