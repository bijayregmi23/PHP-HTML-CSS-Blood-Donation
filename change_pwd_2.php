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
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    	<h2>Change Password</h2>
    </div>
    <form method="post" action="change_pwd_2.php">
    	<?php include('errors.php'); ?>
      <div class="input-group">
    	  <label>Enter New Password</label>
    	  <input type="password" name="password_1">
    	</div>
    	<div class="input-group">
    	  <label>Confirm New Password</label>
    	  <input type="password" name="password_2">
    	</div>
      <div class="input-group">
    	  <button type="submit" class="btn" name="change_pwd_2">Confirm</button>
    	</div>
    </form>
  </body>
</html>
