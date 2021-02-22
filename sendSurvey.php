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
    <h2>Send Survey</h2>
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
    </table>
    <input type="submit" name="submit" value="Submit">
  </form>
  </body>
</html>
