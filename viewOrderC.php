<?php
session_start();
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

  echo "<h2>Order " . $ID . "</h2>";
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
    // echo $row3['ID'];
      if( $row3['is_reviewed'] == 0)
  {
    echo "<td align='center'><a href = 'review.php?ID=$row3[ID]'>Review</a></td>";
  }
  else
  {
     echo "<td align = 'center'>Reviewed</td>";
  }

}
    echo "</table>";
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
