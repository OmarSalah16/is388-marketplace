<html>
<head>
<link rel="stylesheet" href="static/master.css">
</head>
<body>
    <style>
    .main a
    {
        float : right ;
        width: 80px;
    }
      ul{
        float: right;
        list-style-type: none;
        margin: 0;
        padding: 0;
      }
      ul li{
        display: inline-block;
      }
      ul li .nav{
        border-radius: 8px;
        text-decoration: none;
        background-color: black;
        color:#fff;
        padding: 5px 10px;
        border: 1px solid #fff transparent;
        transition: 0.6s ease;
        text-align: center;
      }
      ul li .nav:hover{
        background-color: #fff;
        color: #000;
      }
    </style>
    <div class="main">
      <ul>
              <?php
                if(!empty($_SESSION['ID']))
                {
                  if($_SESSION['role']=="customer")
                  {
                    //include("customerMenu.php");
                    echo "<li> <a class='nav' href = 'customerHome'>Home</a></li>
                    <li> <a class='nav' href = 'clientProfile'>Profile</a></li>
                    <li> <a class='nav' href = 'customerContact'>Contact</a></li>
                    <li> <a class='nav' href = 'support'>Messages</a></li>
                    <li> <a class='nav' href = 'clientSurvey'>Surveys</a></li>
                    <li> <a class='nav' href = 'productSearch'>Search</a> </li>
                    <li> <a class='nav' href = 'logout'>Log Out</a> </li>";
                  }
                  elseif($_SESSION['role']=="admin")
                  {
                    //include("adminBar.php");
                    echo "<li><a class='nav' href = 'adminHome'>Home</a></li>
                    <li><a class='nav' href = 'viewProducts'>Products</a></li>
                    <li><a class='nav' href = 'viewClients'>Clients</a></li>
                    <li><a class='nav' href = 'viewAdmins'>Admins</a></li>
                    <li><a class='nav' href = 'viewOrders'>Orders</a></li>
                    <li><a class='nav' href='viewTickets'>Tickets</a> </li>
                    <li><a class='nav' href='logout'>Log Out</a> </li>";
                  }
                  elseif($_SESSION['role']=="auditor")
                  {
                    //include("auditorBar.php");
                    echo "<li><a class='nav' href = 'auditorHome'>Home</a></li>
                    <li><a class='nav' href = 'viewSurveys'>Surveys</a></li>
                    <li><a class='nav' href = 'viewATickets'>Tickets</a></li>
                    <li><a class='nav' href='logout'>Log Out</a> </li>";
                  }
                  elseif($_SESSION['role']=="HR")
                  {
                    //include("hrBar.php");
                    echo "<li><a class='nav' href = 'hrHome'>Home</a></li>
                    <li><a class='nav' href = 'viewPenaltys'>Penalties</a></li>
                    <li><a class='nav' href = 'viewReports'>Reports</a></li>
                    <li><a class='nav' href='logout'>Log Out</a> </li>";
                  }
                }
                else {
                  //include("guestMenu.php");
                  echo "<li> <a class='nav' href = 'customerHome'>Home</a></li>
                  <li> <a class='nav' href = 'productSearch'>Search</a> </li>
                  <li> <a class='nav' href = 'login'>Log In</a> </li>";
                }
                ?>
                </ul>
    </div>
