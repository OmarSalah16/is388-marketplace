<html>
  <head>
    <meta charset="utf-8">
    <title>View Records</title>
  </head>
<body>
  <div class="form">
    <h2>View Records</h2>
    <label for=""></label> <input type="text" name="searchBar">
    <select name="searchBy" id="searchBy">
      <option value="ID">ID</option>
      <option value="price">price</option>
      <option value="stock">stock</option>
      <option value="rating">rating</option>
    </select>
    <button type="button" name="searchBtn" onclick="search()">Search</button>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Name</strong></th>
          <th><strong>price</strong></th>
          <th><strong>stock</strong></th>
          <th><strong>rating</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php
          function search(){

          }
          $con=mysqli_connect("localhost","root","","marketplace");
          // Check connection
          if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $sel_query="SELECT * FROM products";
          $result = mysqli_query($con,$sel_query);
          while($row = mysqli_fetch_array($result)) { ?>
            <tr>
            <td align="center"><?php echo $row["ID"]; ?></td>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php echo $row["price"]; ?></td>
            <td align="center"><?php echo $row["stock"]; ?></td>
            <td align="center"><?php echo $row["rating"]; ?></td>
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
