<?php

function loginC($con){

  $sql = "SELECT * FROM users WHERE username = $_GET[''] AND password = $password";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  if(mysql_num_rows($result) == 0)
  {
    session_start();
    $_SESSION['client_id'] = $row['ID'];
    $_SESSION['cart'] = [];
    echo "Incorrect";
  }
  else{
    session_start();
    $_SESSION['client_id'] = $row['ID'];
    $_SESSION['cart'] = [];
    header('Location: ../customerHome.html');
    // // window.location.href = "customerHome.html";
  }
}

function signupC($con){
  $sql = "SELECT * FROM users WHERE username = $username AND password = $password";
  $sql2 = "INSERT INTO users (username, password, email, mobile, password, role) VALUES ($username, $password, $email, $mobile, $password, 'user');";
  $result = mysqli_query($con,$sql);
  $result2 = mysqli_query($con,$sql);
  if(mysql_num_rows($result) == 0)
  {

    // window.location.href = "customerHome.html";
  }
  else{
    alert("Information is already used");
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
