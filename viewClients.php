<html>
  <head>
    <meta charset="utf-8">
    <title>View Records</title>
  </head>
<body>
  <div class="form">
    <h2>View Records</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Username</strong></th>
          <th><strong>name</strong></th>
          <th><strong>email</strong></th>
          <th><strong>mobile</strong></th>
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
          $sel_query="SELECT * FROM users WHERE role = 'customer'";
          $result = mysqli_query($con,$sel_query);
          while($row = mysqli_fetch_array($result)) { ?>
            <tr>
            <td align="center"><?php echo $row["ID"]; ?></td>
            <td align="center"><?php echo $row["username"]; ?></td>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php echo $row["email"]; ?></td>
            <td align="center"><?php echo $row["mobile"]; ?></td>
            <td align="center">
            <a href="edit.php?ID=<?php echo $row["ID"]; ?>">Edit</a>
            </td>
            <td align="center">
            <a href="delete.php?ID=<?php echo $row["ID"]; ?>">Delete</a>
            </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  </body>
</html>
