<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login and Search Blood</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    	   <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
    <?php
          if($flag==0)
          {
           include('errors.php');
          }
    ?>
      <div class="input-group">
    		<label>Username</label>
    		<input type="text" name="username" >
    	</div>
    	<div class="input-group">
    		<label>Password</label>
    		<input type="password" name="password">
    	</div>
    	<div class="input-group">
    		<button type="submit" class="btn" name="login_user">Login</button>
    	</div>
    	<p>
    		<a href="register.php">Register</a> |
        <a href="forgot_pwd.php">Forgot Password</a> |
        <a href="request_blood.php">Request Blood</a>
    	</p>
    </form>
    <div class="header">
      <h2>Search Blood</h2>
    </div>
    <form method="post" action="login.php">
      <?php
      if($flag==1)
      {
        include('errors.php');
      }
      ?>
    <div class=input-group>
      <label>Blood Group</label>
      <select name="blood_group">
        <option value="none">Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select>
    </div>
      <div class="input-group">
  			<label>State</label>
  			<select name="state">
				  <option value="none">Select State</option>
    			<option value="Andhra Pradesh">Andhra Pradesh</option>
    			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
    			<option value="Assam">Assam</option>
    			<option value="Bihar">Bihar</option>
  				<option value="Chattisghar">Chattisghar</option>
    			<option value="Goa">Goa</option>
    			<option value="Gujurat">Gujurat</option>
    			<option value="Haryana">Haryana</option>
    			<option value="Himachal Pradesh">Himachal Pradesh</option>
    			<option value="Jammu And Kashmir">Jammu And Kashmir</option>
    			<option value="Jharkhand">Jharkhand</option>
  				<option value="Karnataka">Karnataka</option>
    			<option value="Kerala">Kerala</option>
    			<option value="Maharashtra">Maharashtra</option>
    			<option value="Meghalaya">Meghalaya</option>
    			<option value="Manipur">Manipur</option>
    			<option value="Madhya Pradesh">Madhya Pradesh</option>
  				<option value="Mizoram">Mizoram</option>
    			<option value="Nagaland">Nagaland</option>
    			<option value="Orissa">Orrisa</option>
    			<option value="Punjab">Punjab</option>
    			<option value="Rajasthan">Rajasthan</option>
    			<option value="Sikkim">Sikkim</option>
    			<option value="Tamil Nadu">Tamil Nadu</option>
    			<option value="Tripura">Tripura</option>
  				<option value="Telangana">Telangana</option>
    			<option value="Uttarkhand">Uttarkhand</option>
    			<option value="Uttar Pradesh">Uttar Pradesh</option>
    			<option value="West Bengal">West Bengal</option>
    		</select>
      </div>
    	<div class="input-group">
    		<button type="submit" class="btn" name="search_blood">Search</button>
    	</div>
      </form>
    </body>
  </html>
