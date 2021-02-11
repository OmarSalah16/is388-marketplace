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
                    echo "admin";
                  }
                  elseif($_SESSION['role']=="auditor")
                  {
                    echo "auditor";
                  }
                  elseif($_SESSION['role']=="HR")
                  {
                    echo "HR";
                  }
                }
                else {
                  echo "LOGIN <a href='login.php'> Login </a>";
                }
                ?>
</div>
</body>
</html>
