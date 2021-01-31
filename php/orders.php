<?php
function viewO($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
  $range1 = $_GET['range1'];
  $range2 = $_GET['range2'];
  $sql = "SELECT * FROM orders";
  $sql2="SELECT * FROM orders WHERE $select = '".$bar."'";

  if($bar == ""){
    $result = mysqli_query($con,$sql);
  }
  else {
    $result = mysqli_query($con,$sql2);
  }

  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)) {
    $sql3 = "SELECT name,price FROM products WHERE ID=$row[product_id]";
    $result2 = mysqli_query($con,$sql3);
    $product = mysqli_fetch_array($result2);
    if ($product['price']<$range1 || $product['price']>$range2) {
      continue;
    }
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $product['name'] . "</td>";
    echo "<td>" . $product['price'] . "</td>";
    echo "<td>" . $row['customer_id'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td align='center'><button type='button' name='delete' onclick='deleteOrder(".$row['ID'].")'>Delete</button></td>";
    echo "</tr>";
    }
  }
}

function deleteO($con){
  $id = intval($_GET['ID']);
  $sql = "DELETE FROM orders WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
}


$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {

  case 'del':
    deleteO($con);
    break;

  case 'view':
    viewO($con);
    break;


}
mysqli_close($con);
?>
