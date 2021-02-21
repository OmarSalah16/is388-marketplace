<?php
include "dbhandler.php";
function viewP($con){
  $select = $_POST['searchBy'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_POST['searchBar'];
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
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['stock'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td align='center'><button type='button' name='Edit' onclick='editProduct(".$row['ID'].",\"".$row['name']."\", ".$row['price'].",".$row['stock'].")'>Edit</button></td>";
    echo "<td align='center'><button type='button' name='Delete' onclick='deleteProduct(".$row['ID'].")'>Delete</button></td>";
    echo "</tr>";
    }
  }
}

function deleteP($con){
  $id = intval($_POST['ID']);
  $sql = "DELETE FROM products WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
}

switch ($_POST['q']) {

  case 'del':
    deleteP($con);
    break;

  case 'view':
    viewP($con);
    break;

}
mysqli_close($con);
?>
