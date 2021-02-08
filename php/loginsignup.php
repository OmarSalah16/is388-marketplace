<?php

function loginC($con){

  $username = $_GET['username'];
  $password = $_GET['password'];
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  echo $sql;
  $result = mysqli_query($con,$sql);
  if(!$result)
  {
    echo "incorrect";
  }
  else{
    
    header('Location: ../customerHome.php');
  }
}

function signupC($con){

  $username = $_GET['username'];
  $password = $_GET['password'];
  $email = $_GET['email'];
  $mobile = $_GET['mobile'];
  $sql = "SELECT username FROM users WHERE username = '$username'";
  $sql2 = "INSERT INTO users (username, password, email, mobile) VALUES ($username, $password, $email, $mobile);";
  $result = mysqli_query($con,$sql);
  if(!$result)
  {
    echo "already done";
  }
  else{
    $result2 = mysqli_query($con,$sql2);
    header('Location: ../customerHome.php');
  }
}
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {
  
  case 'signup':
    signupC($con);
    break;

  case 'login':
    loginC($con);
    break;  
}
mysqli_close($con);
?>
