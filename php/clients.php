<?php
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$select = $_GET['select'];
if(is_numeric($select))
  {
    $select = intval($select);
  }
$bar = $_GET['bar'];
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
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['mobile'] . "</td>";
  echo "<td align='center'><a href='#'>View Profile</a></td>";
  echo "<td align='center'><a href='#'>View Orders</a></td>";
  echo "</tr>";
  }
}
mysqli_close($con);
 ?>
