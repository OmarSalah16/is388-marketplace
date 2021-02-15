<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <script type="text/javascript">
      function updateTotal(id,price,quant) {
        var quant = document.getElementById(id).value;
        document.getElementById("total"+id).innerHTML= price*quant;
      }
    </script>
  </head>
  <body>
    <?php
    session_start();
    $cart = $_SESSION['cart'];
    $Qcart = $_SESSION['Qcart'];
    $client_id = $_SESSION['ID'];

    include 'php/dbhandler.php';
    if(isset($_POST['submit']))
    {

      //add updated qcart
      $count = count($cart);
      $i=0;
      for($i;$i<$count;$i++)
      {
        $sql = "SELECT stock FROM products WHERE ID = $cart[$i]";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        if ($row['stock']<$_POST[$cart[$i]]) {
          die("Insuffecient Stock for order.<br><a href='checkout'>Back to Cart</a>");
        }
        if($_POST[$cart[$i]]!=0){
          $Qcart[$i] = $_POST[$cart[$i]];
        }
        else {
          unset($cart[$i]);
          unset($Qcart[$i]);
          $cart = array_values($cart);
          $Qcart = array_values($Qcart);
        }
      }
      $cart1 = implode(",",$cart);
      $Qcart1 = implode(",",$Qcart);
      $sql = "INSERT INTO orders ( customer_id, product_id, quantity) VALUES ( $client_id, '$cart1', '$Qcart1');";
      $result = mysqli_query($con,$sql);

      $lastID = mysqli_insert_id($con);
      $sql2 = "INSERT INTO reviews (order_id, product_id) VALUES (";
      foreach ($cart as $value) {
        $sql2 .= $lastID . ", " . $value . ")," . "(";
      }
      $sql2 = substr($sql2, 0, -2);
      $result2 = mysqli_query($con,$sql2);
      for ($i=0; $i < $count; $i++) {
        $sql3 = "UPDATE products SET stock = stock-$Qcart[$i] WHERE ID = $cart[$i]";
        $result3 = mysqli_query($con,$sql3);
      }

      $_SESSION['cart'] = [];
      $_SESSION['Qcart'] = [];
      header("Location: clientProfile");
    }
    $count = count($cart);

    $i = 0;
    $j = 0;
    $sql = "SELECT * FROM products WHERE ID = ";
    $product_id = "";
    $QcartS = "";

    if($count==0)
    {
      echo "<h1>Your cart is empty!</h1>";
    }
    else{
      while($i!=$count)
      {
         if($i==0)
         {
          $sql .= $cart[$i] . " ";
          $product_id . strval($cart[$i]);
          $QcartS . strval($Qcart[$i]);
         }
         else
         {
          $sql .= "OR ID = " . $cart[$i] . " ";
          $product_id .= "," . strval($cart[$i]);
          $QcartS .= "," . strval($Qcart[$i]);
         }
         $i++;
      }
      $result = mysqli_query($con,$sql);

    echo "<h1>My Cart</h1>";
    echo "<table border='1' style='border-collapse:collapse;''>";
    echo "<thead>
        <tr>
          <th><strong>Name</strong></th>
          <th><strong>Price</strong></th>
          <th><strong>Quantity</strong></th>
          <th><strong>Total Price</strong></th>
        </tr>
      </thead>";
      echo "<form method='post'>";
    while($row = mysqli_fetch_array($result)) {
        $totalPrice = $row['price'] * $Qcart[$j];

        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td> <input id='$row[ID]' name='$row[ID]' onchange='updateTotal($row[ID],$row[price])' type='number' min='0' max='$row[stock]' step='1' value='$Qcart[$j]'> </td>";
        echo "<td id='total$row[ID]'>" . $totalPrice . "</td>";
        echo "</tr>";
        echo "<br>";
        $j++;
    }
    echo "<br>";
    echo "</table>";
    echo "
    <input type='submit' name='submit' value='Checkout'>
    </form>";
    }

    mysqli_close($con);
    ?>

  </body>
</html>
