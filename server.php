<?php
session_start();

// initializing variable
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');

// -----------------------------REGISTER USER---------------------------------------
if (isset($_POST['register_user']))
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $blood_group = mysqli_real_escape_string($db, $_POST['blood_group']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($dob)) { array_push($errors, "Date Of Birth is required"); }
  if ($gender=='none') { array_push($errors, "Gender is requied"); }
  if ($blood_group=='none') { array_push($errors, "Blood Group is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($pincode)) { array_push($errors, "Pincode is required"); }
  if ($state=='none') { array_push($errors, "State is required"); }

// Verifying Age Of Donator

  $dob1=date_create($dob);
  $absdate1=date_create(date("d-m-Y"));
  date_sub($absdate1,date_interval_create_from_date_string("20 Years"));
  $absdate2=date_create(date("d-m-Y"));
  date_sub($absdate2,date_interval_create_from_date_string("60 Years"));
  if($dob1>$absdate1)
  {
    array_push($errors, "Age should be between 20 and 60");
  }
  if($dob1<$absdate2)
  {
    array_push($errors, "Age should be between 20 and 60");
  }



  // first check the database to make sure
  // a user does not already exist with the same username and/or email

  $user_check_query = "SELECT * FROM doners WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user)
  { // if user exists
    if ($user['username'] === $username)
    {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email)
    {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0)
  {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO doners (username,password,fname,lname,dob,gender,blood_group,email,phone,address,city,pincode,state)
  			  VALUES('$username','$password','$fname','$lname','$dob','$gender','$blood_group','$email','$phone','$address','$city','$pincode','$state')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...
// ...

// -------------------LOGIN USER AND SEARCH BLOOD----------------------------------------
$flag = "";
if (isset($_POST['login_user']))
{
  $flag="0"; //Error 1
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username))
  {
  	array_push($errors, "Username is required");
  }
  if (empty($password))
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0)
  {
  	$password = md5($password);
  	$query = "SELECT * FROM doners WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1)
    {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else
    {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['search_blood']))
{
  $flag="1"; //Error 2
  $blood_group = mysqli_real_escape_string($db, $_POST['blood_group']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  if ($blood_group=='none')
  {
    array_push($errors, "Blood Group is required");
  }
  if ($state=='none')
  {
    array_push($errors, "State is required");
  }
  if (count($errors) == 0)
  {
    $_SESSION['blood_group'] = $blood_group;
    $_SESSION['state'] = $state;
    header('location: search_blood.php');
  }

}

//--------------------------------REQUEST BLOOD--------------------------------

if (isset($_POST['request_blood']))
{
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $blood_group = mysqli_real_escape_string($db, $_POST['blood_group']);
  $hrno = mysqli_real_escape_string($db, $_POST['hrno']);
  $pphno = mysqli_real_escape_string($db, $_POST['pphno']);
  $pemail = mysqli_real_escape_string($db, $_POST['pemail']);
  $hname = mysqli_real_escape_string($db, $_POST['hname']);
  $hcity = mysqli_real_escape_string($db, $_POST['hcity']);
  $hstate = mysqli_real_escape_string($db, $_POST['hstate']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if ($gender=='none') { array_push($errors, "Gender is requied"); }
  if ($blood_group=='none') { array_push($errors, "Blood Group is required"); }
  if (empty($hrno)) { array_push($errors, "Hospital Registration Number is required"); }
  if (empty($pphno)) { array_push($errors, "Phone Number is required"); }
  if (empty($pemail)) { array_push($errors, "Email is required"); }
  if (empty($hname)) { array_push($errors, "Hospital Name is required"); }
  if (empty($hcity)) { array_push($errors, "Hospital Adress is required"); }
  if ($hstate=='none') { array_push($errors, "State is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0)
  {
  	$query = "INSERT INTO blood_request (name, age, gender,blood_group,hrno,pphno,pemail,hname,hcity,hstate)
  			      VALUES('$name', '$age', '$gender','$blood_group', '$hrno','$pphno','$pemail', '$hname','$hcity','$hstate')";
  	mysqli_query($db, $query);
    $_SESSION['name'] = $name;
    $_SESSION['blood_group'] = $blood_group;
    $_SESSION['hrno'] = $hrno;
    $_SESSION['pphno'] = $pphno;
    $_SESSION['pemail'] = $pemail;
    $_SESSION['hname'] = $hname;
    $_SESSION['hcity'] = $hcity;
    $_SESSION['hstate'] = $hstate;
    header("location: request.php");
  }
}


//----------------------------EDIT INFO----------------------------------------------------

if (isset($_POST['edit_info']))
{
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $blood_group = mysqli_real_escape_string($db, $_POST['blood_group']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($dob)) { array_push($errors, "Date Of Birth is required"); }
  if ($gender=='none') { array_push($errors, "Gender is requied"); }
  if ($blood_group=='none') { array_push($errors, "Blood Group is required"); }
  if ($address=='Enter Address') { array_push($errors, "Address is required"); }
  if (empty($pincode)) { array_push($errors, "Pincode is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if ($state=='none') { array_push($errors, "State is required"); }

// Verifying Age Of Donator

  $dob1=date_create($dob);
  $absdate1=date_create(date("d-m-Y"));
  date_sub($absdate1,date_interval_create_from_date_string("20 Years"));
  $absdate2=date_create(date("d-m-Y"));
  date_sub($absdate2,date_interval_create_from_date_string("60 Years"));
  if($dob1>$absdate1)
  {
    array_push($errors, "Age should be between 20 and 60");
  }
  if($dob1<$absdate2)
  {
    array_push($errors, "Age should be between 20 and 60");
  }

  // Finally, edit info of user if there are no errors in the form
  if (count($errors) == 0)
  {
    $uname=$_SESSION['username'];
    if($uname!='')
    {
  	   $query = "UPDATE doners SET fname='$fname',lname='$lname',dob='$dob',
       blood_group='$blood_group',gender='$gender',city='$city',pincode='$pincode',
       address='$address',state='$state' WHERE username='$uname'";
  	   mysqli_query($db, $query);
    }
  	header('location: index.php');
  }
}


//----------------------------CHANGE PASSWORD 1-------------------------
if (isset($_POST['change_pwd_1']))
{
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $password_3 = mysqli_real_escape_string($db, $_POST['password_3']);

  if (empty($password_2)) { array_push($errors, "Password is required"); }
  if ($password_2 != $password_3) {
	array_push($errors, "The two passwords do not match");
  }

  if (count($errors) == 0)
  {
    $username=$_SESSION['username'];
    $query = "SELECT password FROM doners WHERE username='$username'";
    $results=mysqli_query($db, $query);
    $password=mysqli_fetch_assoc($results)['password'];
    $password_1=md5($password_1);
    if ($password==$password_1)
    {
      $password = md5($password_2);
      $query = "UPDATE doners SET password='$password' WHERE username='$username'";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Password Changed Successfully";
      header('location: index.php');
    }
    else
    {
      array_push($errors, "Incorrect Password !");
    }
  }
}

//----------------------------FORGET PASSWORD(EMAIL PART)-------------------------
if (isset($_POST['enter_email']))
{
  $email = mysqli_real_escape_string($db, $_POST['email']);
  if (empty($email)) { array_push($errors, "Email is required"); }
  $query = "SELECT email FROM doners WHERE email='$email'";
  $results = mysqli_query($db, $query);
  if (count($errors) == 0)
  {
    if (mysqli_fetch_assoc($results)['email']==$email)
    {
      $otp =mt_rand(100000,999999);
      $msg ="Generated OTP for changing password is ".$otp."";
      $msg = wordwrap($msg,70);
      mail($email,"CHANGE PASSWORD",$msg,'From:misblooddonation@gmail.com');
      $_SESSION['otp'] = $otp;
      $_SESSION['email'] = $email;
      header('location: password_otp.php');
    }
    else
    {
      array_push($errors, "Doner doesnt exist !");
      array_push($errors, "Invalid Email !");
    }
  }
}


//----------------------------FORGET PASSWORD(OTP PART)-------------------------
if (isset($_POST['enter_otp']))
{
  $otp = mysqli_real_escape_string($db, $_POST['otp']);
  if (empty($otp)) { array_push($errors, "OTP not entered !"); }
  if (count($errors) == 0)
  {
    if ($_SESSION['otp']==$otp)
    {
      header('location: change_pwd_2.php');
    }
    else
    {
      array_push($errors, "Invalid Otp !");
    }
 }
}




//----------------------------CHANGE PASSWORD 2-------------------------
if (isset($_POST['change_pwd_2']))
{
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  if (count($errors) == 0)
  {
    $password = md5($password_1);
    $email=$_SESSION['email'];
    $query = "UPDATE doners SET password='$password' WHERE email='$email'";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Password Changed Successfully";
    session_destroy();
    header('location: login.php');
  }

}



?>
