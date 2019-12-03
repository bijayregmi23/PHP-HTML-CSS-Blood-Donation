<?php include('server.php') ?>
<!Doctype html>
<html>
	<head>
		<title>Request Blood</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			   <h2>Patients Requirements</h2>
		</div>
		<form method="post" action="request_blood.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Name</label>
				<input type=text name="name">
			</div>
			<div class="input-group">
				<label>Age</label>
				<input type=text name="age">
			</div>
			<div class="input-group">
			  <label>Gender</label>
		  	<select name="gender">
      		<option value="none">Select Gender</option>
    			<option value="male">Male</option>
    			<option value="female">Female</option>
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
				<label>Patients Registration Number</label>
				<input type=text name="hrno">
			</div>
			<div class="input-group">
				<label>Patients Phone Number</label>
				<input type=text name="pphno">
			</div>
			<div class="input-group">
				<label>Patients Email</label>
				<input type=text name="pemail">
			</div>
			<div class="input-group">
				<label>Hospital Name</label>
				<input type=text name="hname">
			</div>
			<div class="input-group">
				<label>Hospital Address(City)</label>
				<input type=text name="hcity">
			</div>
			<div class="input-group">
  			<label>State</label>
  			<select name="hstate">
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
				<button type="submit" class="btn" name="request_blood">Submit</button>
			</div>
		</form>
	</body>
</html>
