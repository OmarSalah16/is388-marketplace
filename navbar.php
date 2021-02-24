<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" href="static/master.css">
</head>
<body>
    <style>

    .topnav a
    {
        float : right ;
        width: 80px;
    }

    .topnav{
        background: black;
    }

    </style>
<div class="topnav">
              <?php
                if(!empty($_SESSION['ID']))
                {
                  if($_SESSION['role']=="customer")
                  {
                    include("customerMenu.php");
                  }
                  elseif($_SESSION['role']=="admin")
                  {
                    include("adminBar.php");
                  }
                  elseif($_SESSION['role']=="auditor")
                  {
                    include("auditorBar.php");
                  }
                  elseif($_SESSION['role']=="HR")
                  {
                    echo "HR";
                  }
                }
                else {
                  echo "<a class='login' href='login.php'> Login </a>";
                }
                ?>
</div>
</body>
</html>

<style media="screen">

  .login{
    font-size: 25px;
    color:white;
    font-family: Century Gothic;
    margin-right: 20px;
    margin-top: 10px;
  }
</style>
