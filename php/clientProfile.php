<?php
session_start();
function viewP($con){

  $ID = $_SESSION['ID'];
  $sql = "SELECT * FROM users WHERE ID = $ID";
  $sql2 = "SELECT * FROM orders WHERE customer_id = $ID";
  $sql3 = "SELECT * FROM user_image WHERE user_id = $ID";
  $sql4 = "SELECT name FROM products WHERE ID = ";
  $result = mysqli_query($con,$sql);
  $result2 = mysqli_query($con,$sql2);
  $result3 = mysqli_query($con,$sql3);

  if (mysqli_num_rows($result3) > 0) {
    $row = mysqli_fetch_array($result3);
    echo "<img style='border-radius: 50%' src='./user_images/" . $row['image_name'] . "'alt='Profile Picture'>";
  }
  else {
      echo "<img style='border-radius: 50%' src='./user_images/default.jpg'alt='Profile Picture'>";
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
  echo "<h1>My Orders</h1>";

  if (mysqli_num_rows($result2) == 0) {
    echo "<tr>";
    echo "<td>" . "Your orders are empty." . "<td>";
    echo "</tr>";
  }
  else {
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

      echo "<td>" . substr($productString, 0, -1) . "</td>";

      echo "<td align='center'><button type='button' onclick='viewOrder(".$row3['ID'].")'>View</button></td>";
    }  }

}


function deleteP($con){
  $id = intval($_GET['ID']);
  $sql = "DELETE FROM users WHERE ID = $ID ";
  $result = mysqli_query($con,$sql);
}


function editP($con){
  $sql = "UPDATE users SET name='$_POST[name]',mobile='$_POST[mobile]',email='$_POST[email]' WHERE ID= $_SESSION[ID]";
  $result = mysqli_query($con,$sql);
}
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_POST['q']) {

  case 'del':
    deleteP($con);
    break;

  case 'view':
    viewP($con);
    break;

  case 'edit':
    editP($con);
    break;

  case 'review':
    reviewP($con);
    break;
}
mysqli_close($con);
?>
