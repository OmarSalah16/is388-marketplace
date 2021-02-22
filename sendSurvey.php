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
      if(isset($_POST['submit'])){

      }
    ?>
    <h2>Send Survey</h2>
    <form action="" method="post">
      <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
          <tr>
            <th><input type="checkbox" onchange="selectAll()"></th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
      <?php
        $sql = "SELECT * FROM users WHERE role = 'customer'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td><input type='checkbox' name='select[]' value='$row[ID]'></td>";
          echo "<td>$row[name]</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
    </table>
    </form>
  </body>
</html>
