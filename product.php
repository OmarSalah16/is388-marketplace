<!DOCTYPE html>
<html>
<head>
  <title></title>
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
</head>
<body>
  <?php
  function viewP($con){
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
        
      
  
    while($row3 = mysqli_fetch_array($result3)) {
      echo "<tr>";
      echo "<td width='120px'><img width='120px' alt='pic' src='product_images/$ID/" . "$row3[image_name]'></td>";
      echo "</tr>";
      } 

    while($row = mysqli_fetch_array($result)) {
      echo "<br>";
      echo "<tr>";
      echo "<td> ID:  " . $row['ID'] . "</td>" . "<br>";
      echo "<td> Name:  " . $row['name'] . "</td>" . "<br>";
      echo "<td> Price:  " . $row['price'] . "</td>" . "<br>";
      echo "<td> Stock:  " . $row['stock'] . "</td>" . "<br>";
      echo "<td> <span class = 'rating'></span>Average Rating:  " . $row['rating'] . "</td>" . "<br>" . "<br>";
      echo "</tr>";
      }

   echo "Reviews: " . "<br>";
    
    if (mysqli_num_rows($result2) == 0) {
      echo "No reviews.";
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
    echo "<div style = 'font-size : 12px;'>";
      echo "5 Stars : " . $r5 . "<br>";
      echo "4 Stars : " . $r4 . "<br>";
      echo "3 Stars : " . $r3 . "<br>";
      echo "2 Stars : " . $r2 . "<br>";
      echo "1 Stars : " . $r1 . "<br>" . "<br>";

      echo "</div>";

      echo "<tr>";
      echo "<td>" . $row4['review'] . "</td>" . "<br>";
      echo "<td>" . $row4['rating'] . "</td>" . "<br>" . "<br>";
      echo "</tr>";
      }
    }
     
    
} 
  $con = mysqli_connect('localhost','root','','marketplace');
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  viewP($con);
  mysqli_close($con);
  ?>
</body>
</html>
