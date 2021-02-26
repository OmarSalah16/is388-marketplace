<?php
session_start();
include "adminVerification.php";
include "navbar.php";
include 'php/customError.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>View Tickets</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewTickets(false)">
    <h1><u>Tickets</u></h1>
    <button type="button" class="myTicket"onclick="viewTickets(true)">View my tickets</button><br><br>
    <table width="100%" border="2" style="border-collapse:collapse;" class="table table-striped">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Customer ID</strong></th>
          <th><strong>Title</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Created</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table><br>
    <button type="button" class='refresh'onclick="viewTickets(false)">Refresh</button>
  </body>
</html>

<style media="screen">
*{
  font-family:Century Gothic;
}

h1{
  margin-left: 45%;
  color:white;

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
  background: white;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

.refresh:hover{
  background: #2ecc71;
}

.myTicket{
  border:0;
  background: white;
  margin-left: 20px;
  display: block;
  text-align: center;
  border: 2px solid red;
  padding: 14px 40px;
  outline: none;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

.myTicket:hover{
  background: red;
}
</style>
