<html>
  <head>
    <meta charset="utf-8">
    <title>Review</title>
    <script src="js/review.js"></script>
  </head>
<body>
    <div id="rTable">
      <form class="review" action="review.php" method="post" >
        <label for="review">Review</label> <br><textarea name="review"></textarea> <br>
        <label for="rating">Rating</label><br> <input type="number" name="rating" value="1" min = "1" max="5" required> <br>
        <!-- <button type="button" name="submitABtn" id="submitABtn" onclick="review(ID)">Submit</button> -->
        <input type="text" name="id" style="display: none;" value="<?php  echo  $_GET['ID'];?>">
        <input type="submit" name="">
      </form>
    </div>
    <?php
    if (isset($_POST['review'],$_POST['rating'],$_POST['id'])) {
      $con = mysqli_connect('localhost','root','','marketplace');
      if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
      }
      $sql = "INSERT INTO reviews (order_id,rating,review) VALUES ($_POST[id],$_POST[rating],'$_POST[review]')";
      $sql2 = "UPDATE orders SET review_status = 1 WHERE ID = $_POST[id]";
      $result = mysqli_query($con,$sql);
      $result2 = mysqli_query($con,$sql2);
      mysqli_close($con);
      header("Location: clientProfile.html");
    }
    ?>
<!-- <div id="viewProduct">
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" oninput="showProducts()">
    <select name="searchBy" id="searchBy" onchange="showProducts()">
      <option value="ID">ID</option>
      <option value="name">name</option>
      <option value="price">price</option>
      <option value="stock">stock</option>
      <option value="rating">rating</option>
    </select>

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
      <tbody id="rTable">
      </tbody>
    </table>
</div> -->

  </body>
</html>
