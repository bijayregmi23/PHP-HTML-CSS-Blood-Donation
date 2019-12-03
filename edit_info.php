<?php include('server.php') ?>
<?php
//
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
    <title>Edit Info</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    	<h2>Edit Info</h2>
    </div>
    <form method="post" action="edit_info.php">
    	<?php include('errors.php'); ?>
      <div class="input-group">
    	  <label>First Name</label>
    	  <input type="text" name="fname" >
    	</div>
      <div class="input-group">
    	  <label>Last Name</label>
    	  <input type="text" name="lname" >
    	</div>

      <div class="input-group">
        <label>Date Of Birth</label>
        <input type=date name="dob" >
      </div>
      <div class=input-group>
  		  <label>Gender</label>
  		  <select name="gender">
          <option value="none">Select Gender</option>
      	  <option value="Male">Male</option>
      	  <option value="Female">Female</option>
      	 </select>
      </div>
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
        <label>Address</label>
        <input type="text" name="address" >
      </div>
      <div class="input-group">
    	  <label>City</label>
    	  <input type="text" name="city" >
    	</div>
      <div class="input-group">
    	  <label>Pincode</label>
    	  <input type="text" name="pincode" >
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
    	  <button type="submit" class="btn" name="edit_info">Submit</button>
    	</div>
    </form>
  </body>
</html>
