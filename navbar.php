<?php  ?>
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
    ul{
      float: right;
      list-style-type: none;
      margin: 10;
      padding: 0;

    }

    ul li{
      display: inline-block;
    }

    ul li a{
      border-radius: 8px;
      text-decoration: none;
      color:#fff;
      padding: 5px 10px;
      border: 1px solid #fff transparent;
      background-color: black;
      transition: 0.6s ease;
      text-align: center;
    }

    ul li a:hover{
      background-color: #fff;
      color: #000;
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
                    include("hrBar.php");
                  }
                }
                else {
                  include("customerMenu.php");
                }
                ?>
</div>
</body>
</html>
