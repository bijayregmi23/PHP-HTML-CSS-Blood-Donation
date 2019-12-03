<?php include('server.php') ?>
<?php
//  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
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
    <form method="post" action="change_pwd_1.php">
    	<?php include('errors.php'); ?>
      <div class="input-group">
    	  <label>Enter Old Password</label>
    	  <input type="password" name="password_1">
    	</div>
      <div class="input-group">
    	  <label>Enter New Password</label>
    	  <input type="password" name="password_2">
    	</div>
    	<div class="input-group">
    	  <label>Confirm New Password</label>
    	  <input type="password" name="password_3">
    	</div>
      <div class="input-group">
    	  <button type="submit" class="btn" name="change_pwd_1">Confirm</button>
    	</div>
    </form>
  </body>
</html>
