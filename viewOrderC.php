<?php
session_start();
include "cartInit.php";
include "navbar.php";
include 'php/customError.php';
error_reporting(E_ALL & ~E_NOTICE);
function viewO($con){
  $ID = $_GET['id'];
  $sql = "SELECT * FROM orders WHERE ID = $ID";
  $sql2 = "SELECT * FROM products WHERE ID = ";
  $sql3 = "SELECT * FROM reviews WHERE order_id = $ID";
  $result = mysqli_query($con,$sql);
  $result3 = mysqli_query($con,$sql3);
  $productString = "";
  $priceTracker = 0;
  $cancellable = false;

  echo "<br><br>";
  echo "<h1>Order " . $ID . "</h1>";
  echo "<table border = '1' style='border-collapse:collapse;'>";
  echo "<thead>
         <tr>
           <th><strong>Name</strong></th>
           <th><strong>Price</strong></th>
           <th><strong>Quantity</strong></th>
           <th><strong>Total Price</strong></th>
         </tr>
       </thead>";
  while($row = mysqli_fetch_array($result)) {
    $arrayP = explode(",", $row['product_id']);
    $arrayQ = explode(",", $row['quantity']);
    echo "<h3>Status: " . $row['status'] . "</h3>";
    $status = $row['status'];
    if ($status == "incomplete") {
      $cancellable = true;
    }
    }
    $i = 0;
    $j = 0;
    $count = count($arrayP);
  for ($i; $i < $count; $i++) {
    if($i==count($arrayP)-1)
    {
      $sql2 .= $arrayP[$i];
    }
    else{
      $sql2 .= $arrayP[$i] . " OR ";
    }
  }


  $result2 = mysqli_query($con,$sql2);
  while($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row2['name'] . "</td>";
    echo "<td>" . $row2['price'] . "</td>";
    echo "<td>" . $arrayQ[$j] . "</td>";
    echo "<td>" . $row2['price']*$arrayQ[$j] . "</td>";
    $row3 = mysqli_fetch_array($result3);
    if ($status == "complete") {
      if( $row3['is_reviewed'] == 0)
  {
    echo "<td align='center'><a href = 'review.php?ID=$row3[ID]'>Review</a></td>";
  }
  elseif ($row3['is_reviewed' == 1]) {
    echo "<td align = 'center'>Reviewed</td>";
  }
    }
    

}
    echo "</table> <br>";
    if ($cancellable) {
      echo "<td align='center'><a href = 'php/changeOrders.php?q=cancel&ID=$ID'>Cancel order</a></td>";
    }
}

$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {

  case 'view':
    viewO($con);
    break;
}
mysqli_close($con);
?>

<style media="screen">

*{
  font-family: Century Gothic;
  text-align: center;
}

table{
  margin:auto;
}
body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg9.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

a{
  color:red;
}
</style>
