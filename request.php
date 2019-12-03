<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Request Blood</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    	<h2></h2>
    </div>
    <div class="content">
        <?php
        $name=$_SESSION['name'];
        $blood_group=$_SESSION['blood_group'];
        $hrno=$_SESSION['hrno'];
        $pphno=$_SESSION['pphno'];
        $pemail=$_SESSION['pemail'];
        $hname=$_SESSION['hname'];
        $hcity=$_SESSION['hcity'];
        $hstate=$_SESSION['hstate'];
        $db = mysqli_connect('localhost', 'root', '', 'blood_donation');
        $query = "SELECT * FROM doners WHERE blood_group='$blood_group' AND state='$hstate'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)>0) :
          echo"
          <div class='error success'>
          <h3>Email Sent Successfully</h3>
          <h3>Doner List :-</h3>
          </div>";
          echo "
          <table>";
            $count=1;
          while($row=mysqli_fetch_assoc($results))
          {
            $msg1 ="There is an urgent need of blood for a patient named ".$name."\n with blood group ".$blood_group." who is undergoing treatment at ".$hname." , ".$hcity." , ".$hstate."";
            $msg = $msg1."\nPatients Contact Number : ".$pphno."\nPatients Registration Number : ".$hrno;
            $msg = wordwrap($msg,70);
            $email = $row["email"];
            mail($email,"URGENT BLOOD REQUIREMENT",$msg,'From:misblooddonation@gmail.com');
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
          }
          echo "</table>";
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
