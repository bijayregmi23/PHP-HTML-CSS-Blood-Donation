<?php include('server.php') ?>
<?php
//  session_start();

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: forgot_pwd.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    	   <h2>Forget Password</h2>
    </div>
    <form method="post" action="password_otp.php">
      <?php
        if($flag==0)
        {
         include('errors.php');
        }
      ?>
    </p><h3>Enter the OTP that has been sent to your email</h3></p></p>
      <div class="input-group">
    		<label>Enter OTP</label>
    		<input type="text" name="otp" >
    	</div>
    	<div class="input-group">
    		<button type="submit" class="btn" name="enter_otp">Submit</button>
    	</div>
    </form>
  </body>
</html>
