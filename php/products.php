<?php
function viewP($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
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
    echo "<td align='center'><button type='button' name='edit' onclick='editProduct(".$row['ID'].",\"".$row['name']."\", ".$row['price'].",".$row['stock'].")'>Edit</button></td>";
    echo "<td align='center'><button type='button' name='delete' onclick='deleteProduct(".$row['ID'].")'>Delete</button></td>";
    echo "</tr>";
    }
  }
}
function addP($con){
  $sql = "INSERT INTO products ( name, price, stock) VALUES ('$_GET[name]','$_GET[price]','$_GET[stock]')";
  $result=mysqli_query($con,$sql);
}
function deleteP($con){
  $id = intval($_GET['ID']);
  $sql = "DELETE FROM products WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
}
function editP($con){
  $sql ="UPDATE products SET name='$_GET[name]',price='$_GET[price]',stock='$_GET[stock]' WHERE ID= '$_GET[id]'";
  $result = mysqli_query($con,$sql);
  //echo $sql;
}
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {
  case 'add':
    addP($con);
    break;

  case 'del':
    deleteP($con);
    break;

  case 'view':
    viewP($con);
    break;

  case 'edit':
    editP($con);
    break;
}
mysqli_close($con);
?>
