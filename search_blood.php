<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search Blood</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

	<div class="header">
		<h2>Search Blood</h2>
	</div>
	<div class="content">
      <?php
      $blood_group=$_SESSION['blood_group'];
      $state=$_SESSION['state'];
      $db = mysqli_connect('localhost', 'root', '', 'blood_donation');
      $query = "SELECT fname,lname,blood_group,email,address,city,state FROM doners WHERE blood_group='$blood_group' AND state='$state'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results)>0):
      ?>
      <?php
	        echo"
	        <div class='error success'>
	         <h3>Doners List</h3>
	        </div>";
	        echo "
	        <table>";
	          $count=1;
	          while($row=mysqli_fetch_assoc($results))
	          {
	            echo "<h3><strong>".$count."</strong></h3>
	            <table>
	              <tr>
	                <td>Name : </td>
	                <td>".$row["fname"]." ".$row["lname"]."</td>
	              </tr>
	                <td>Blood Group : </td>
	                <td>".$row["blood_group"]."</td>
	              </tr>
	                <td>Email : </td>
	                <td>".$row["email"]."</td>
	              </tr>
	                <td>Address : </td>
	                <td>".$row["address"]."</td>
	              </tr>
	                <td>City : </td>
	                <td>".$row["city"]."</td>
	              </tr>
	                <td>State : </td>
	                <td>".$row["state"]."</td>
	              </tr>
	            </table>
	            <br>";
	            $count=$count+1;
	          }
	        echo "</table>";
	        ?>
	      <?php
	      else :
	      {
	        echo"
	        <div class='error success'>
	        <h3>Doners are not available</h3>
	        </div>";
	      }
	      endif ?>
	    <br>
	    <p>
	    <a href="login.php">Login</a> |
	    <a href="register.php">Register</a> |
	    <a href="request_blood.php">Request Blood</a>
	    </p>
	</div>
	</body>
</html>
