<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th>Survey Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        session_start();
        include 'php/dbhandler.php';
          $sql = "SELECT survey.name, survey.ID, survey_answers.ID AS sID FROM survey INNER JOIN survey_answers ON survey.ID = survey_answers.survey_id WHERE survey_answers.customer_id = $_SESSION[ID] AND is_open = 1";
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_array($result)) {
            echo "<tr><td><a href='submitAnswer?ID=$row[sID]&sID=$row[ID]'>$row[name]</a></td></tr>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
