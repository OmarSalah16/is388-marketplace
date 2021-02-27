<?php
session_start();
include "cartInit.php";
include "navbar.php";
include 'php/customError.php';
echo "<br>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Surveys</title>
  </head>
  <body>
    <h1>Surveys</h1>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th>Survey Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'php/dbhandler.php';
          $sql = "SELECT survey.name, survey.ID, survey_answers.ID AS sID FROM survey INNER JOIN survey_answers ON survey.ID = survey_answers.survey_id WHERE survey_answers.customer_id = $_SESSION[ID] AND is_open = 1";
          $result = mysqli_query($con,$sql);
          if (mysqli_num_rows($result) == 0) {
            echo "<tr><td>No result found.</td></tr>";
          }
          while($row = mysqli_fetch_array($result)) {
            echo "<tr><td><a href='submitAnswer?ID=$row[sID]&sID=$row[ID]'>$row[name]</a></td></tr>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>

<style media="screen">

*{
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg2.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}
  h1,td{
    text-align: center;
  }

  th{
    font-size: 20px;
  }

  td{
    padding:5px;
  }
</style>
