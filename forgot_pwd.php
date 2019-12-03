<?php include('server.php') ?>
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
    <form method="post" action="forgot_pwd.php">
      <?php
        if($flag==0)
        {
         include('errors.php');
        }
      ?>
      <div class="input-group">
    		<label>Email</label>
    		<input type="email" name="email" >
    	</div>
    	<div class="input-group">
    		<button type="submit" class="btn" name="enter_email">Submit</button>
    	</div>
    </form>
  </body>
</html>
