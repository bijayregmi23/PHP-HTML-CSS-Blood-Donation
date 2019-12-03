<?php
  session_start();

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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <br>

      <?php
        $uname=$_SESSION['username'];
        $db = mysqli_connect('localhost', 'root', '', 'blood_donation');
        $query = "SELECT * FROM doners WHERE username='$uname'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)>0) :
      ?>
        <?php
        while($r=mysqli_fetch_assoc($results))
        {
          echo "
          <table>
            <tr>
              <td>First Name :</td>
              <td>".$r["fname"]."</td>
            </tr>
            <tr>
              <td>Last Name :</td>
              <td>".$r["lname"]."</td>
            </tr>
            <tr>
              <td>Date Of Birth :</td>
              <td>".$r["dob"]."</td>
            </tr>
            <tr>
              <td>Gender :</td>
              <td>".$r["gender"]."</td>
            </tr>
            <tr>
              <td>Blood Group :</td>
              <td>".$r["blood_group"]."</td>
            </tr>
            <tr>
              <td>Email :</td>
              <td>".$r["email"]."</td>
            </tr>
            <tr>
              <td>Phone :</td>
              <td>".$r["phone"]."</td>
            </tr>
            <tr>
              <td>Address :</td>
              <td>".$r["address"]."</td>
            </tr>
            <tr>
              <td>City :</td>
              <td>".$r["city"]."</td>
            </tr>
            <tr>
              <td>Pincode :</td>
              <td>".$r["pincode"]."</td>
            </tr>
            <tr>
              <td>State :</td>
              <td>".$r["state"]."</td>
            </tr>
          </table>";
        }
        ?>
      <?php endif ?>
      <br>
      <p>
      <a href="edit_info.php">Edit Profile</a> |
      <a href="change_pwd_1.php">Change Password</a> |
      <a href="index.php?logout='1'">Logout</a>
      </p>
    <?php endif ?>
</div>

</body>
</html>
