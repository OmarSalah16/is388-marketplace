<?php
session_start();
$_SESSION['cart'] = [];

function viewP($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
  $range1 = $_GET['range1'];
  $range2 = $_GET['range2'];
  $sql = "SELECT * FROM products";
  $sql2="SELECT * FROM products WHERE $select = '".$bar."'";
 
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
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['stock'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td align='center'><button type='button' name='delete' onclick='addToCart(".$row['ID'].")'>Add to cart</button></td>";
    echo "<td align='center'><button type='button' name='delete' onclick='viewProduct(".$row['ID'].")'>View</button></td>";
    echo "</tr>";
    }
  }
}

function addCart($con){
  echo "test";
  $ID = intval($_GET['ID']);
  array_push($_SESSION['cart'], $ID);

  
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
    viewP($con);
    break;

  case 'cart':
    addCart($con);
    break;  


}
mysqli_close($con);
?>
