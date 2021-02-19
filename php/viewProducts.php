<?php
function viewP($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
  $sql = "SELECT * FROM products";
  $sql2 = "SELECT * FROM products WHERE $select = '".$bar."'";
  $sql3 = "SELECT * FROM product_images";
  $result3 = mysqli_query($con,$sql3);

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
    while($row = mysqli_fetch_array($result)) //$row3 = mysqli_fetch_array($result3)) 
    {
    echo "<tr>";
    // echo "<td>" . $row3['image_name'] . "</td>";
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
  echo "test <br>";
  $ID = $_GET['ID'];
  $sql = "DELETE FROM products WHERE ID = $ID ";
  $sql2 = "DELETE FROM product_image WHERE product_id = $ID";
  $result = mysqli_query($con,$sql);
  $result2 = mysqli_query($con,$sql2);
   $folder = "F:\\\\_Marwan Documents\\Data Management\\Xampp\\htdocs\\Marketplace1\\product_images\\$ID";
         if (! is_dir($folder)) {
        throw new InvalidArgumentException("$folder must be a directory");
    }
    if (substr($folder, strlen($folder) - 1, 1) != '/') {
        $folder .= '/';
    }
    $files = glob($folder . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($folder);
}


include "dbhandler.php";

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
