<?php
session_start();
include "cartInit.php";
include "navbar.php";
include 'php/dbhandler.php';
include 'php/customError.php';
$ID = $_GET['ID'];
$r1 = 0;
$r2 = 0;
$r3 = 0;
$r4 = 0;
$r5 = 0;

if(is_numeric($ID))
  {
    $ID = intval($ID);
  }
$sql = "SELECT * FROM products WHERE ID = '".$ID."'";
$sql2 = "SELECT * FROM reviews WHERE product_id = $ID AND is_reviewed = 1";
$sql3 = "SELECT * FROM product_image WHERE product_id = $ID";

$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);

$baseurl = "product_images//$ID/";
$images = [];
$name;
$price;
$stock;
$rating;
$reviews = [];
$ratings = [];
while($row3 = mysqli_fetch_array($result3)) {
  // echo "<tr>";
  // echo "<td width='120px'><img width='120px' alt='pic' src='product_images/$ID/" . "$row3[image_name]'></td>";
  // echo "</tr>";
  array_push($images,$row3['image_name']);
  }

$row = mysqli_fetch_array($result);
$name = $row['name'];
$price = $row['price'];
$stock = $row['stock'];
$rating = $row['rating'];
// echo "<br>";
// echo "<tr>";
// echo "<td> Name:  " . $row['name'] . "</td>" . "<br>";
// echo "<td> Price:  " . $row['price'] . "</td>" . "<br>";
// echo "<td> Stock:  " . $row['stock'] . "</td>" . "<br>";
// echo "<td> <span class = 'rating'></span>Average Rating:  " . $row['rating'] . "</td>" . "<br>" . "<br>";
// echo "</tr>";


// echo "Reviews: " . "<br>";

if (mysqli_num_rows($result2) == 0) {
  $reviews = "No reveiws.";
}
else{
  while($row4 = mysqli_fetch_array($result2)) {
  if ($row4['rating'] == 5) {
    $r5++;
  }
  if ($row4['rating'] == 4) {
    $r4++;
  }
  if ($row4['rating'] == 3) {
    $r3++;
  }
  if ($row4['rating'] == 2) {
    $r2++;
  }
  if ($row4['rating'] == 1) {
    $r1++;
  }
  // echo "<div style = 'font-size : 12px;'>";
  // echo "5 Stars : " . $r5 . "<br>";
  // echo "4 Stars : " . $r4 . "<br>";
  // echo "3 Stars : " . $r3 . "<br>";
  // echo "2 Stars : " . $r2 . "<br>";
  // echo "1 Stars : " . $r1 . "<br>" . "<br>";
  // echo "</div>";

  // echo "<tr>";
  // echo "<td>" . $row4['review'] . "</td>" . "<br>";
  // echo "<td>" . $row4['rating'] . "</td>" . "<br>" . "<br>";
  // echo "</tr>";
  array_push($reviews,$row4['review']);
  array_push($ratings,$row4['rating']);
  }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Product Details</title>
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
    .container{
      margin-left: 0;
    }

    .slideshow{
        width: 100%;
        height: 125px;
        background-image: url('pics/img1.jpg');
        background-size: 100% 100%;
        animation: slider 9s infinite linear;
    }

    @keyframes slider {
      <?php if(isset($images[0])) {echo "0%{background-image: url('$baseurl$images[0]');}";} ?>
      <?php if(isset($images[1])) {echo "20%{background-image: url('$baseurl$images[1]');}";} ?>
      <?php if(isset($images[2])) {echo "40%{background-image: url('$baseurl$images[2]');}";} ?>
      <?php if(isset($images[3])) {echo "60%{background-image: url('$baseurl$images[3]');}";} ?>
      <?php if(isset($images[4])) {echo "80%{background-image: url('$baseurl$images[4]');}";} ?>
    }
    .details{
      content-align:center;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 0px;
    }
    .details .table{
      margin-bottom: 0px;
    }
    .panel-heading{

    }
  </style>
</head>
<body>
<br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">Product Details</div>
          <div class="panel-body"><?php
            echo "<p class='details'>
            <table class='table'>
                <tr><td>Name: $name</td></tr>
                <tr><td>Price: $price</td></tr>
                <tr><td>Stock: $stock</td></tr>
                <tr><td>Rating: $rating</td></tr>
            </table>
            </p>";
          ?></div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-danger">
          <div class="panel-heading">Product Image(s)</div>
          <div class="panel-body">
            <div class="slideshow">
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-warning">
          <div class="panel-heading">Product Review(s)</div>
          <div class="panel-body"></div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-success">
          <div class="panel-heading">Product Rating</div>
          <div class="panel-body"></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
