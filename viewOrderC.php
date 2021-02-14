<?php
// <img style="border-radius: 50%" src="hidethepainharold.jpg" alt="Profile Picture">
session_start();
function viewO($con){


  $ID = $_GET['id'];
  $sql = "SELECT * FROM orders WHERE ID = $ID";
  $sql2 = "SELECT * FROM products WHERE ID = ";
  $result = mysqli_query($con,$sql);
  $productString = "";
  $priceTracker = 0;


  echo "Order " . $ID . "<br>";
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
  echo $sql2;
  while($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row2['name'] . "</td>";
    echo "<td>" . $row2['price'] . "</td>";
    echo "<td>" . $arrayQ[$j] . "</td>";
    echo "<td>" . $row2['price']*$arrayQ[$j] . "</td>";

    }
    echo "</table;";
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
