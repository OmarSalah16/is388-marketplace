<?php
session_start();
include "cartInit.php";
include "customerMenu.php";
echo "<br>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'php/dbhandler.php';
      if (isset($_POST['submit'])) {
        $answers = "";
        $flag = true;
        foreach ($_POST['answer'] as $value) {
          if($value == "")
          {
            $flag = false;
          }
          else {
            $answers .= $value . ",";
          }
        }
        $answers = substr($answers,0,-1);
        if ($flag) {
          $sql2 = "UPDATE survey_answers SET is_open = 0, answers = '$answers' WHERE ID = $_GET[ID]";
          $result2 = mysqli_query($con,$sql2);
          $sql3 = "UPDATE survey SET replies = replies + 1 WHERE ID = $_GET[sID]";
          $result3 = mysqli_query($con,$sql3);
          if($result2)
          {
            header("Location: clientSurvey");
          }
          else {
            echo "<h3 style='color: red;'>Error submitting answer.</h3>";
          }
        }
      }
     ?>

    <form method="post">
      <?php
        if(isset($_GET['ID'],$_GET['sID']))
        {
          $sql = "SELECT *, survey.ID AS sID FROM survey INNER JOIN survey_answers ON survey.ID = survey_answers.survey_id WHERE survey_answers.ID = $_GET[ID]";
          $result = mysqli_query($con,$sql);
          if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_array($result);
            if ($row['is_open']==0) {
              die("<h1>Already Submitted</h1>");
            }
            $questions = explode(',',$row['questions']);
            //echo "<input type='text' name='ID' value='$_GET[ID]' style='display:none;'>";
            //echo "<input type='text' name='sID' value='$row[sID]' style='display:none;'>";
            foreach ($questions as $value) {
              echo $value;
              echo "<br>";
              echo "<input type='text' name='answer[]' value='' placeholder='Answer here...' required> <br>";
            }
            echo "</td>";
            echo "</tr>";
          }
          else {
            echo "string";
            header("Location: clientSurvey");
          }
        }
        else {
          echo "string";
          header("Location: clientSurvey");
        }
      ?>
      <input type="submit" name="submit" value="Submit Answers">
    </form>
  </body>
</html>

<style media="screen">

  *{
    margin-top: 20px;
    text-align:center;
  }


  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg4.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }

  input[type="text"]{
    border:0;
    background: white;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    border-radius: 24px;
    transition: 0.25s;
  }

  input[type="text"]:focus{
    width: 280px;
    border-color: #2ecc71;
  }

  input[type="submit"]{
    border:0;
    background: #2ecc71;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid black;
    padding: 14px 40px;
    outline: none;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
  }

  input[type="submit"]:hover{
    background: yellow;
  }
</style>
