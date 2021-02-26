<?php
session_start();
include "auditorVerification.php";
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
  <body onload="displayATicket()">
    <div id="error">

    </div>
    <div id="rTable"></div>
    <textarea id="comment" name="comment" placeholder="Enter your Comment..."></textarea> <br>
    <button type="button" onclick="addComment()">Add Comment</button>
  </body>
</html>

<style media="screen">

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
  font-size: 15px;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.1)), url(pics/message1.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

</style>
