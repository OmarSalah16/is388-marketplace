<?php
session_start();
include "adminVerification.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "auditorBar.php"; ?>
    <meta charset="utf-8">
    <title>View Surveys</title>
    <script src="js/survey.js"></script>
  </head>
  <body onload="viewSurveys()">
    <h1><u>Surveys</u></h1>
    <a href="viewSurvey.php?q=a">View Archives</a>
    <a href="addSurvey.php">Add Survey</a><br><br>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Survey Name</strong></th>
          <th><strong>Creator ID</strong></th>
          <th><strong>Replies</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table><br>
    <button class='refresh'type="button">Refresh</button>
  </body>
</html>

<style media="screen">
  *{
    font-family: Century Gothic;
  }

a{
  color:blue;
}
  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg8.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }


  .refresh{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid red;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
  }

  .refresh:hover{
    background: red;
  }


  h1{
    margin-left: 45%;
  }
  td{
    text-align: center;
  }
</style>
