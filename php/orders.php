<?php
session_start();
function viewO($con){
  $select = $_POST['searchBy'];
  $bar = $_POST['searchBar'];
  $range1 = $_POST['min'];
  $range2 = $_POST['max'];
  $isResult = false;
  $isProduct = false;
  $_SESSION['min'];
  $_SESSION['max'];
  $check = true;
  if ($bar == "" ) {
      $sql = "SELECT * FROM orders ";
  }
  else{
    if ($select == "products") {
      $isProduct = true;
      $sql = "SELECT * FROM orders ";
    }
    else{
      $sql = "SELECT * FROM orders WHERE $select = '$bar'";
    }

  }
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)) {
    $sql2 = "SELECT name FROM products WHERE ID = ";
    $sql3 = "SELECT price FROM products WHERE ID = ";
    $productString = [];
    $arrayP = explode(",", $row['product_id']);
    $arrayQ = explode(",", $row['quantity']);
    $quantity = $row['quantity'];
    $totalPrice = 0;
    $count = count($arrayP);
    $i = 0;
    for($i;$i<$count;$i++) {
      if($i==($count-1))
      {
        $sql2 .= $arrayP[$i];
        $sql3 .= $arrayP[$i];
      }
      else{
        $sql2 .= $arrayP[$i] . " OR ID = ";
        $sql3 .= $arrayP[$i] . " OR ID = ";
      }
    }
    $z = 0;
    $result3 = mysqli_query($con,$sql3);
    while($row3 = mysqli_fetch_array($result3)) {
      $totalPrice += $row3['price'] * $arrayQ[$z];
      $z++;
      }
      if ($check) {
        $_SESSION['min'] = $totalPrice;
        $_SESSION['max'] = $totalPrice;
        $check = false;
      }
      if($totalPrice < $_SESSION['min'])
      {
        $_SESSION['min'] = $totalPrice;
      }
      if($totalPrice > $_SESSION['max'])
      {
        $_SESSION['max'] = $totalPrice;
      }
      if ($totalPrice < $range1 || $totalPrice > $range2) {
        echo $totalPrice.'<br>'.$range1.'<br>'.$range2;
        continue;
      }

    $result2 = mysqli_query($con,$sql2);
    while($row2 = mysqli_fetch_array($result2)) {
      array_push($productString,$row2['name']);
      }
      if ($isProduct) {
        $nameFound = false;
        foreach ($productString as $value) {
        if (is_int(strpos($value, $bar))) {
          $nameFound = true;
        }

      }
      if (!$nameFound) {
          continue;
        }
      }
      $nameOutput = "";
      foreach ($productString as $value) {$nameOutput .= $value .  "," ;}
      $isResult = true;
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['customer_id'] . "</td>";
      echo "<td>" . substr($nameOutput, 0, -1) . "</td>";
      echo "<td>" . $quantity . "</td>";
      echo "<td>" . $totalPrice . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
    }
    if (!$isResult) {
      echo "No results found.";
    }
  }
}

$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_POST['q']) {

  case 'del':
    deleteO($con);
    break;

  case 'view':
    viewO($con);
    break;


}
mysqli_close($con);
?>
