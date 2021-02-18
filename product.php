<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
</body>
</html>
<?php
function viewP($con){
  $ID = $_GET['ID'];
  if(is_numeric($ID))
    {
      $ID = intval($ID);
    }
  $sql = "SELECT * FROM products WHERE ID = '".$ID."'";
  $sql2 = "SELECT * FROM orders INNER JOIN reviews ON orders.ID = reviews.order_id WHERE orders.product_id = 1";
  $sql3 = "SELECT image_name FROM product_image WHERE product_id = $ID";

  $result = mysqli_query($con,$sql);
  $result2 = mysqli_query($con,$sql2);
  $result3 = mysqli_query($con,$sql3);


  while($row = mysqli_fetch_array($result)) {
    echo "<br>";
    echo "<h2>Product Details</h2>";
    echo "<tr>";
    echo "<td> ID:  " . $row['ID'] . "</td>" . "<br>";
    echo "<td> Name:  " . $row['name'] . "</td>" . "<br>";
    echo "<td> Price:  " . $row['price'] . "</td>" . "<br>";
    echo "<td> In Stock:  " . $row['stock'] . "</td>" . "<br>";
    echo "<td> Rating:  " . $row['rating'] . "</td>" . "<br>" . "<br>";
    echo "</tr>";
    }

 echo "<h2>Reviews</h2> " . "<br>";

  while($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row2['review'] . "</td>" . "<br>";
    echo "<td>" . $row2['rating'] . "</td>" . "<br>";
    echo "</tr>";
    }


  while($row3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
    echo "<td> <img style='border-radius: 50%;' src='product_px/" . $row3['image_name'] . "' alt='Profile Picture'>  </td>  <br>  <br>";
    echo "</tr>";
    }
  }

$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
viewP($con);
mysqli_close($con);
?>

<style media="screen">
*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.3)), url(pics/gift.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    padding-left: 20px;
    padding-top: 20px;
  }


</style>
