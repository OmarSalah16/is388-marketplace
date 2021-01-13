<html>
  <head>
    <meta charset="utf-8">
    <title>View Records</title>
  </head>
<body>
    <?php include "menu.php";?>
  <div class="form">
    <h2>View Records</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>product id</strong></th>
          <th><strong>customer id</strong></th>
          <th><strong>date</strong></th>
          <th><strong>status</strong></th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          $con=mysqli_connect("localhost","root","","marketplace");
          // Check connection
          if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $count=1;
          $sel_query="SELECT * FROM employees";
          $result = mysqli_query($con,$sel_query);
          while($row = mysqli_fetch_array($result)) { ?>
            <tr>
            <td align="center"><?php echo $row["ID"]; ?></td>
            <td align="center"><?php echo $row["product_id"]; ?></td>
            <td align="center"><?php echo $row["customer_id"]; ?></td>
            <td align="center"><?php echo $row["status"]; ?></td>
            <td align="center"><?php echo $row["date"]; ?></td>
            <td align="center">
            <a href="edit.php?ID=<?php echo $row["ID"]; ?>">Edit</a>
            </td>
            <td align="center">
            <a href="delete.php?ID=<?php echo $row["ID"]; ?>">Delete</a>
            </td>
            </tr>
        <?php $count++; } ?>
      </tbody>
    </table>
  </div>
  </body>
</html>
