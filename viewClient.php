<?php
session_start();
include "adminVerification.php";
include "navbar.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <script src="js/clients.js"></script>
  </head>
  <style type="text/css">
    img{
        height: 150px;
        width: 200px;
    }
  </style>
<body onload="viewClient()">
<h1>Client Profile</h1>

<div id="viewProduct">
    <table width="100%" border="1" style="border-style:groove;">
      <tbody id="rTable">
      </tbody>
    </table>
</div>

<div id="rTable" style="display: none;">
</div>
  </body>
</html>

<style media="screen">

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
  color:white;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/background3.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

button{
  border:0;
  background: none;
  display: block;
  margin: 5px auto;
  text-align: center;
  border: 1px solid #2ecc71;
  padding: 7px 17px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

button:hover{
  background: #2ecc71;
}
</style>
