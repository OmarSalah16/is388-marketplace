<?php
session_start();

function viewC($con){
  $cart = $_SESSION['cart'];

  $sql = "SELECT * FROM products WHERE  ";
  $i=0;
  foreach($cart as $product)
  {
    if($i==0)
    {
      $sql .= "ID = ".$product;
    }
    else
    {
      $sql .= " OR ID = ".$product;
    }
  $i+=1;
  }

  if ($i==0)
  {
    echo "Cart is Empty";
  }
  else{
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['stock'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td align='center'><button type='button' name='add' onclick='remove(".$row['ID'].")'>Remove</button></td>";
    echo "</tr>";
    }
  }
}



function deleteC($con){
 $id = intval($_GET['ID']);
 $cart = $_SESSION['cart'];
 echo "<br>";
 $cart = array_diff($cart,[$id]);
 $_SESSION['cart'] = $cart;
}


$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {

  case 'view':
    viewC($con);
    break;

  case 'remove':
  deleteC($con);
  break;


}
mysqli_close($con);
?>
