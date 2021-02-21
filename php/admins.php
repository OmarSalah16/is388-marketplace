<?php
session_start();
include "dbhandler.php";
function viewA($con){
  $select = $_POST['searchBy'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_POST['searchBar'];
  $sql = "SELECT * FROM users INNER JOIN hierarchy ON hierarchy.admin_id = users.ID";
  $sql2 = "SELECT * FROM users INNER JOIN hierarchy ON hierarchy.admin_id = users.ID WHERE $select = '".$bar."'";
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
  echo "testst";
  $sql = "INSERT INTO users (name , password, mobile, email, role) VALUES ('$_POST[name]','$_POST[password]','$_POST[mobile]','$_POST[email]','admin')";
  $result=mysqli_query($con,$sql);
  $sql2 = "SELECT ID FROM users WHERE email = '$_POST[email]'";
  $result2=mysqli_query($con,$sql2);
  $admin_id = mysqli_fetch_array($result2);
  $sql3 = "INSERT INTO hierarchy (admin_id, rank) VALUES ($admin_id[ID],$_POST[rank])";
  echo $sql3;
  $result3 = mysqli_query($con,$sql3);
}

function deleteA($con){
  $id = intval($_POST['ID']);
  $sql = "DELETE FROM users WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
}

switch ($_POST['q']) {
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
