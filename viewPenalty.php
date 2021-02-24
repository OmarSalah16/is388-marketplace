<?php
session_start();
include "HRverification.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/ticket.js"></script>
    <style media="screen">
      .admin{
        border-style: solid;
        border-color: red;
        margin: 3px;
        padding: 3px;
      }
      .customer{
        border-style: solid;
        margin: 3px;
        padding: 3px;
      }
      .read{
        font-style: italic;
      }
      .unread{
        text-decoration: underline;
        font-weight: bold;
      }
      textarea{
        width: 400px;
        height: 300px;
      }
    </style>
  </head>
  <body onload="displayPenalty()">
    <div id="error"></div>
    <div id="rTable"></div>
    <!-- <textarea id="comment" name="comment" placeholder="Enter your Comment..."></textarea> <br>
    <button type="button" onclick="addPenalty()">Add Penalty</button> -->
  </body>
</html>

<style media="screen">
body{
  color:white;
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg5.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}
</style>
