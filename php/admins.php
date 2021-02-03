<?php
session_start();
function viewA($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
  $sql = "SELECT * FROM users INNER JOIN hierarchy ON hierarchy.admin_id = users.ID";
  $sql2="SELECT * FROM users INNER JOIN hierarchy ON hierarchy.admin_id = users.ID WHERE $select = '".$bar."'";

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
    echo "<td>" . $row['rank'] . "</td>";
    if($_SESSION['rank']<$row['rank'])
    {
      echo "<td align='center'><button type='button' name='delete' onclick='deleteAdmin(".$row['ID'].")'>Delete</button></td>";;
    }
    else {
      echo "<td></td>";
    }
    echo "</tr>";
    }
  }
}
function addA($con){
  $sql = "INSERT INTO users ( username,name ,password, mobile, email, role) VALUES ('$_GET[username]','$_GET[name]','$_GET[password]','$_GET[mobile]','$_GET[email]','admin')";
  $result=mysqli_query($con,$sql);
  $sql2 = "SELECT ID FROM users WHERE username = '$_GET[username]'";
  $result2=mysqli_query($con,$sql2);
  $admin_id = mysqli_fetch_array($result2);
  $sql3 = "INSERT INTO hierarchy (admin_id, rank) VALUES ($admin_id[ID],$_GET[rank])";
  $result3 = mysqli_query($con,$sql3);
}
function deleteA($con){
  $id = intval($_GET['ID']);
  $sql = "DELETE FROM users WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
}
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {
  case 'add':
    addA($con);
    break;

  case 'del':
    deleteA($con);
    break;

  case 'view':
    viewA($con);
    break;

}
mysqli_close($con);
?>
