<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" id="rTable">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <style media="screen">

      body{
        margin:0;
        padding:0;
        font-family: Century Gothic;
        background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/shopping.jpg);
        background-size: cover;
        background-position:center;
        background-repeat: no-repeat;
        height:100vh;
      }

      .box{
        width:300px;
        padding: 40px;
        position: absolute;
        left:50%;
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

      .box input[type="submit"].signup{
        border: 2px solid orange;
      }

      .box input[type="submit"].signup:hover{
        background: orange;
      }

      .log{
        border-radius: 24px;
        text-decoration: none;
        color:#fff;
        padding: 5px 20px;
        border: 1px solid #fff;
        transition: 0.6s ease;
      }

      .log:hover{
        background-color: #fff;
        color: #000;
      }

      .error{
        color: red;
        font-weight: bold;
      }

    </style>
  </head>
  <body>
    <form class="box" method="post">
      <h1>Login</h1>
      <div class="error">
        <?php
        session_start();
        include 'php/dbhandler.php';
        include 'php/customError.php';
          if(isset($_POST['submit']))
          {
            $sql = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
            $result = mysqli_query($con, $sql);
              if(mysqli_num_rows($result) == 1)
            {
              echo "correct credentials";
              $row = mysqli_fetch_array($result);
              $_SESSION['ID'] = $row['ID'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['role'] = $row['role'];
              if($_SESSION['role']=="customer")
                {
                  header("Location: customerHome.php");
                  $_SESSION['cart'] = [];
                  $_SESSION['Qcart'] = [];
                }
              elseif ($_SESSION['role']=="admin") {
                $sql1 = "SELECT rank FROM hierarchy WHERE admin_id = $_SESSION[ID]";
                $result1 = mysqli_query($con, $sql1);
                $row = mysqli_fetch_array($result1);
                $_SESSION['rank'] = $row['rank'];
                header("Location: adminHome");
              }
              elseif($_SESSION['role']=="auditor")
              {
                header("Location: auditorHome");
              }
              elseif($_SESSION['role']=="HR")
              {
                header("Location: hrHome");
              }
            }
            else {
              echo "Incorrect Credentials";
            }
          }

         ?>
      </div>
      <input type="text" name="email" id="email" placeholder="E-mail">
      <input type="password" name="password" id="password" placeholder="Password">
      <input type="submit" name="submit" value="Login">
      <a class='log' href="signup.php">Sign Up</a>
    </form>
  </body>
</html>
