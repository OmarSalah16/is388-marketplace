<?php
session_start();
include "cartInit.php";
include "navbar.php";
include 'php/customError.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Send Survey</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/survey.js"></script>
  </head>
  <body>
    <?php
      include 'php/dbhandler.php';
      if(isset($_POST['select']))
      {
        $sql = "INSERT INTO survey_answers (customer_id,survey_id) VALUES ";
        foreach ($_POST['select'] as $value) {
          $sql.= "($value, $_GET[ID]),";
        }
        $sql = substr($sql,0,-1);
        $result = mysqli_query($con,$sql);

      }
    ?>
    <h1>Survey Dispatch</h1>
    <p id='error'></p>
      <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
          <tr>
            <th><input type="checkbox" onchange="selectAll()"></th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
        <form action='' method='post'>
          <?php
            $sql = "SELECT * FROM users WHERE role = 'customer'";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td><input type='checkbox' class='select' name='select[]' value='$row[ID]'></td>";
              echo "<td>$row[name]</td>";
              echo "</tr>";
            }
          ?>
    </tbody>
  </table><br>
    <input type="submit" name="submit" value="Submit">
  </form>
  </body>
</html>

<style media="screen">
*{
  font-family: Century Gothic;
}
body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg8.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

td{
  text-align: center;
}

input[type="submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid black;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

input[type="submit"]:hover{
  background: black;
}

h1{
  text-align: center;
}
</style>
