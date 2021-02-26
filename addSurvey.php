<?php
include 'php/customError.php';
session_start();
include "auditorVerification.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Survey</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/surveyCreator.js"></script>
    <style media="screen">
      .question{
        border: solid;
        border-width: 1px;
        margin: 16px 4px;
      }
      .question *{
        margin: 3px;
        padding: 4px;
      }

      *{
        font-family: Century Gothic;
      }
    </style>
  </head>
  <body>
    <h2>Survey Creator</h2>
    Add <input type="number" value="1" min="1" max='10' id='n'>
    Question(s)<button type="button" id='add'>Go</button> <br><br>
    <form id="survey">
      <label for="name">Survey Name:</label>
        <input type="text" name="name" value="" required><br><br>
      <div id="question" class="question test">
        <h6>Question 1</h6>
        <input type="text" name="q[]" value="" required class="q">
      </div>
      <input class="submit" type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>

<style media="screen">

  .question input[type="text"]{
    width:800px;
  }

  .question{
    text-align:center;
  }

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/background4.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }

  .submit{
    text-align: center;
    margin-left: 720px;
    padding:9px;
    cursor: pointer;
  }

  input{
    border:0;
    text-align: center;
    border: 2px solid #3498db;
    outline: none;
    border-radius: 24px;
  }

  button{
    border:0;
    text-align: center;
    border: 1px solid black;
    outline: none;
    border-radius: 24px;
    cursor: pointer;
    margin-left: 5px;
  }


</style>
