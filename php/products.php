<?php
$select = $_GET['select'];
if(is_numeric($select))
  {
    $select = intval($select);
  }
$bar = $_GET['bar'];
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
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
  echo "<td align='center'><a href='edit.php?id=".$row["ID"]."'>Edit</a></td>";
  echo "<td align='center'><button type='button' name='delete' onclick='deleteProduct(".$row['ID'].")'>Delete</button></td>";
  echo "</tr>";
  }
}
mysqli_close($con);
?>
