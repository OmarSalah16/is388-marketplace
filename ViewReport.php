<?php
session_start();
include "HRverification.php";
include "navbar.php";
include 'php/customError.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/ticket.js"></script>
    <style media="screen">

    body{
      background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/background3.jpg);
      height:100vh;
      background-size: cover;
      background-position:center;
      background-repeat: no-repeat;
    }
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

      div{
        color:white;
        border-color: black;
      }
    </style>
  </head>
  <body onload="displayReport()">
    <div id="error"></div>
    <div id="rTable"></div>
    <textarea id="comment" name="comment" placeholder="Enter your Comment..."></textarea> <br>
    <button type="button" onclick="addPenalty()">Add Penalty</button>
  </body>
</html>
