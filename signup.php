<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'marketplace');


if (isset($_POST['reg']))
{

 $username = mysqli_real_escape_string($db, $_POST['username']);
 echo $username;
 $email = mysqli_real_escape_string($db, $_POST['email']);
 $password1 = mysqli_real_escape_string($db, $_POST['pass1']);
 $password2 = mysqli_real_escape_string($db, $_POST['pass2']);
 $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
 $address = mysqli_real_escape_string($db, $_POST['addr']);
if (empty($username)) { array_push($errors, "Username is required"); } // username
if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { array_push($errors, "Please Enter a valid email address"); } // email
if (strlen($password1)<8) { array_push($errors, "Password must be at least 8 characters long"); } // password
for($i=0;$i<strlen($password1);$i++)
  {
  	if(ctype_upper($password1{$i})){ array_push($errors, "Password must contain at least one Upper letter"); }
  }
  for($i=0;$i<strlen($password1);$i++)
  {
  	if(is_numeric($password1{$i})){ array_push($errors, "Password must contain at least one number"); }
  }


if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }
if (empty($address)) { array_push($errors, "Please enter your address"); }
if (empty($mobile)) { array_push($errors, "Please enter your mobile number"); }
if (strlen($mobile)<11) { array_push($errors, "Please enter a valid mobile number"); }
 $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'OR mobile='$mobile' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);
if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
     if ($user['mobile'] === $mobile) {
      array_push($errors, "Mobile number already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password1);
  	$query = "INSERT INTO users (username, email, password,mobile,addr)
  			  VALUES('$username', '$email', '$password','mobile','address')";
  			  mysqli_query($db, $query);
  			  $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: customerHome.php');
  }

}
