<?php
session_start();
function viewP($con){
  $select = $_POST['searchBy'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_POST['searchBar'];
  $range1 = $_POST['min'];
  $range2 = $_POST['max'];
  $sql = "SELECT * FROM products  WHERE price >= $range1 AND price <= $range2";
  $sql2 = "SELECT * FROM products WHERE $select = '".$bar."' AND price >= $range1 AND price <= $range2";
  $isProduct = false;
  $nameFound = true;
  $r1 = 0;
  $r2 = 0;
  $r3 = 0;
  $r4 = 0;
  $r5 = 0;
  if($bar == ""){
    $result = mysqli_query($con,$sql);
  }
  else {
    if($select == "Name")
    {
      $isProduct = true;
      $result = mysqli_query($con,$sql);
    }
    else
      $result = mysqli_query($con,$sql2);
  }
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)) {
      if ($isProduct) {
        $nameFound = false;
        if (is_int(strpos($row['name'], $bar))) {
          $nameFound = true;
        }
        if (!$nameFound) {
          continue;
        }
      }
      $sql3 = "SELECT * FROM reviews WHERE product_id = $row[ID] AND is_reviewed = 1";
      $result3 = mysqli_query($con,$sql3);
      if ($row['stock'] > 0) {
        $val = 1;
        $min = 1;
      }
      else {
        $val = 0;
        $min = 0;
      }

      while($row3 = mysqli_fetch_array($result3)) {
      if ($row3['rating'] == 5) {
        $r5++;
      }
      if ($row3['rating'] == 4) {
        $r4++;
      }
      if ($row3['rating'] == 3) {
        $r3++;
      }
      if ($row3['rating'] == 2) {
        $r2++;
      }
      if ($row3['rating'] == 1) {
        $r1++;
      }
    }
      echo "<tr>";
      echo "<td width='160px'><img width='160px' alt='pic' src='product_images/$row[ID]/1.jpg'></td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['stock'] . "</td>";
      echo "<td class='tooltips'>" . $row['rating'] . "<span class='tooltiptexts'> 5 Stars:$r5 <br> 4 Stars:$r4 <br> 3 Stars:$r3 <br> 2 Stars:$r2 <br> 1 Stars:$r1 <br></span></td>";
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
