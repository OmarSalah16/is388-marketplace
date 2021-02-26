<?php
include 'customError.php';
session_start();
function confirmO($con){
  $ID = $_POST['ID'];
  $sql = "UPDATE orders SET status = 'complete' WHERE ID = $ID";
  $result = mysqli_query($con,$sql);
  
}

function cancelO($con){
  $id = intval($_GET['ID']);
  $sql = "UPDATE orders SET status = 'cancelled' WHERE ID = $id ";
  $result = mysqli_query($con,$sql);
  header("Location: ..//viewOrderC.php?&q=view&id=$id");
}

$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
if (isset($_GET['q'])) {
  $q = $_GET['q'];
}
if (isset($_POST['q'])) {
  $q = $_POST['q'];
}
switch ($q) {

  case 'confirm':
    confirmO($con);
    break;

  case 'cancel':
    cancelO($con);
    break;
}
mysqli_close($con);
?>
