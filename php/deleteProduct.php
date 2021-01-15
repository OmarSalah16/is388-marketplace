<?php
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$id = intval($_GET['ID']);
$sql = "DELETE FROM products WHERE ID = $id ";
$result = mysqli_query($con,$sql);

 ?>
