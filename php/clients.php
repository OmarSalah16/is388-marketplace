<?php
include 'dbhandler.php';
function showClients($con){
  $select = $_POST['searchBy'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_POST['searchBar'];
  $sql = "SELECT * FROM users WHERE role = 'customer'";
  $sql2="SELECT * FROM users WHERE role = 'customer' AND $select = '".$bar."'";
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
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['mobile'] . "</td>";
    echo "<td align='center'><a href='viewClient?id=$row[ID]'>View Profile</a></td>";
    echo "<td align='center'><a href='viewOrders?id=$row[ID]'>View Orders</a></td>";
    echo "</tr>";
    }
  }
}

function viewClient($con){

    $ID = $_POST['ID'];
    $sql = "SELECT * FROM users WHERE ID = $ID";
    $sql2 = "SELECT * FROM orders WHERE customer_id = $ID";
    $sql3 = "SELECT * FROM user_image WHERE user_id = $ID";
    $sql4 = "SELECT name FROM products WHERE ID = ";
    $result = mysqli_query($con,$sql);
    $result2 = mysqli_query($con,$sql2);
    $result3 = mysqli_query($con,$sql3);

    while($row = mysqli_fetch_array($result3)) {

        echo "<img style='border-radius: 50%' src='./user_images/" . $row['image_name'] . "'alt='Profile Picture'>";
      }

     echo "<thead>
             <tr>
               <th><strong>ID</strong></th>
               <th><strong>Name</strong></th>
               <th><strong>Email</strong></th>
               <th><strong>Mobile</strong></th>
             </tr>
           </thead>";

      while($row2 = mysqli_fetch_array($result)) {

      echo "<tr>";
      echo "<td>" . $row2['ID'] . "</td>";
      echo "<td>" . $row2['name'] . "</td>";
      echo "<td>" . $row2['email'] . "</td>";
      echo "<td>" . $row2['mobile'] . "</td>";
      }
    echo "<h1>Client Orders</h1>";

    echo "<thead>
            <tr>
              <th><strong>ID</strong></th>
              <th><strong>Products</strong></th>
            </tr>
          </thead>";
    while($row3 = mysqli_fetch_array($result2)) {
    $sql4 = "SELECT name FROM products WHERE ID = ";
    $productString = "";
    echo "<tr>";
    echo "<td>" . $row3['ID'] . "</td>";
    $array = explode(",", $row3['product_id']);
    $count = count($array);
    $i = 0;
    for($i;$i<$count;$i++) {
      if($i==($count-1))
      {
        $sql4 .= $array[$i];
      }
      else{
        $sql4 .= $array[$i] . " OR ";
      }
    }
    $result4 = mysqli_query($con,$sql4);
    while($row4 = mysqli_fetch_array($result4)) {
      $productString .= $row4['name'] . ",";
      }

      echo "<td>" . substr($productString, 0, -1) . "</td></tr>";
    }
}
switch ($_POST['q']) {
  case 'show':
    showClients($con);
    break;

  case 'view':
    viewClient($con);
    break;
}
mysqli_close($con);

 ?>
