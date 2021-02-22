<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <style media="screen">
      body{
        margin:0;
        padding:0;
        font-family: Century Gothic;
        background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/register.jpg);
        background-size: cover;
        background-position:center;
        background-repeat: no-repeat;
        height:100vh;
      }
      .box{
        width:300px;
        padding: 40px;
        position: absolute;
        left:20%;
        bottom: 50%;
        transform: translate(-50%, 50%);
        background: #191919;
        text-align: center;
        border-radius: 24px;
      }
      .box h1{
        color:white;
        text-transform: uppercase;
        font-weight: 500;
      }
      .box input[type="text"], .box input[type="password"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
      }
      .box input[type="text"]:focus, .box input[type="password"]:focus{
        width: 280px;
        border-color: #2ecc71;
      }
      .box input[type="submit"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor:pointer;
      }
      .box input[type="submit"]:hover{
        background: #2ecc71;
      }
    </style>
  </head>
  <body>
    <form class="box" action="signup.php" method="post">
      <h1>Sign Up Now</h1>
      <input type="text" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <input type="password" name="Cpassword" placeholder="Confirm Password">
      <input type="text" name="name" placeholder="Name">
      <input type="text" name="mobile" placeholder="Mobile Number">
      <input type="text" name="address" placeholder="Address">
      <input type="submit" name="submit" value="Register">
    </form>
    <?php
      include 'php/dbhandler.php';
      if (isset($_POST['submit'])){
        $err = [];
        if($_POST['password']!=$_POST['Cpassword']){
          array_push($err,"confirm password");
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          array_push($err,"incorrect email");
        }
        $checksql = "SELECT email FROM users WHERE email = '$_POST[email]'";
        $checkres = mysqli_query($con,$checksql);
        if (mysqli_num_rows($checkres)!=0){
          array_push($err,"email already in use");
        }
        $i=0;
        for($i;$i<count($err);$i++){
          echo $err[$i]."<br>";
        }
        if($i!=0){
          exit(0);
        }
        $sql = "INSERT INTO users (email,password,name,mobile,role) VALUES ('$_POST[email]','$_POST[password]','$_POST[name]','$_POST[mobile]','customer')";
        $result = mysqli_query($con,$sql);
        if($result){
          echo "success";
          // header("Location: login.php");
        }
        else {
          echo "failure";
        }
      }
    ?>
     </body>
</html>
