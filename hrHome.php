<?php
session_start();
include "HRverification.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
  </head>
  <body>
    <div class="box" >
      <a class="x4" href="viewPenaltys">View Penalties</a>
      <a class="x5" href="viewReports">View Reports</a>
      <a class="x6" href="logout">Log Out</a>
    </div>
  </body>
</html>

<style media="screen">

  body{
    margin:0;
    padding:0;
    font-family: Century Gothic;
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/admin.jpg);
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    height:100vh;
  }

  .box{
    bottom:45%;
    width:300px;
    padding: 40px;
    position: absolute;
    left:50%;
    transform: translate(-50%, 45%);
    background: #191919;
    text-align: center;
    border-radius: 24px;
  }


  .box a{
    text-transform: uppercase;
    text-decoration: none;
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

  .box a:hover{
    background: #2ecc71;
  }

  .box a.x2{
    border: 2px solid red;
  }
  .box a.x2:hover{
    background: red;
  }

  .box a.x3{
    border: 2px solid teal;
  }
  .box a.x3:hover{
    background: teal;
  }

  .box a.x4{
    border: 2px solid orange;
  }
  .box a.x4:hover{
    background: orange;
  }

  .box a.x5{
    border: 2px solid grey;
  }
  .box a.x5:hover{
    background: grey;
  }

</style>
