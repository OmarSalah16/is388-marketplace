<?php
session_start();

function viewP($con){
  $select = $_POST['searchBy'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_POST['searchBar'];
  $range1 = $_POST['range1'];
  $range2 = $_POST['range2'];
  $sql = "SELECT * FROM products";
  $sql2 = "SELECT * FROM products WHERE $select = '".$bar."'";

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
      if ($row['stock']>0) {
        $val = 1;
        $min = 1;
      }
      else {
        $val = 0;
        $min = 0;
      }
      echo "<tr>";
      echo "<td width='160px'><img width='160px' alt='pic' src='product_images/$row[ID]/1.jpg'></td>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['stock'] . "</td>";
      echo "<td>" . $row['rating'] . "</td>";
      echo "<td align='center'><button type='button' name='delete' onclick='addToCart(".$row['ID'].")'>Add to cart</button></td>";
      echo "<td align='center'><input type = 'number' id = '$row[ID]' name = 'step' value = '$val' step = '1' min = '$min' max='$row[stock]'></td>";
      echo "<td align='center'><button type='button' name='delete' onclick='viewProduct(".$row['ID'].")'>View</button></td>";
      echo "</tr>";
    }
  }
}

function addCart($con){
  $ID = intval($_POST['ID']);
  $quantity = intval($_POST['quantity']);
  $sql = "SELECT * FROM products WHERE ID = $ID";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  if($row['stock']<$quantity||$row['stock']==0){
    die("Quantity larger than available stock.");
  }

  $key = array_search($ID,$_SESSION['cart']);
  if(is_numeric($key)){
    unset($_SESSION['cart'][$key]);
    unset($_SESSION['Qcart'][$key]);
  }
    array_push($_SESSION['cart'], $ID);
    array_push($_SESSION['Qcart'], $quantity);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    $_SESSION['Qcart'] = array_values($_SESSION['Qcart']);
    echo "Added to cart.";
}

include 'dbhandler.php';
switch ($_POST['q']) {

  case 'view':
    viewP($con);
    break;

  case 'cart':
    addCart($con);
    break;


}
mysqli_close($con);
?>
