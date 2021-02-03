<?php
function viewO($con){
  $select = $_GET['select'];
  $bar = $_GET['bar'];
  if ($select=="ID")
  {
    $select = "orders.ID";
  }
  $range1 = $_GET['range1'];
  $range2 = $_GET['range2'];
  $sql = "SELECT orders.ID, product_id, name, price, customer_id, status, date FROM orders INNER JOIN products ON orders.product_id = products.ID";
  $sql2="SELECT orders.ID, product_id, name, price, customer_id, status, date FROM orders INNER JOIN products ON orders.product_id = products.ID WHERE $select = '$bar'";

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
    if ($row['price']<$range1 || $row['price']>$range2) {
      continue;
    }
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
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
