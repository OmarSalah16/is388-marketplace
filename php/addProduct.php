<?php
include "dbhandler.php";
function editP($con){

 $name = $_POST['name'];
 $price = $_POST['price'];
 $stock = $_POST['stock'];
 $ID = $_POST['q'];
 
 $sql = "UPDATE products SET name='$name', price=$price , stock=$stock WHERE ID= $ID";
 $result = mysqli_query($con,$sql);

 $sql2 = "DELETE FROM product_image WHERE product_id = $ID";
 if (isset($_FILES['my_file'])) {

        $myFile = $_FILES['my_file'];

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
          $result2 = mysqli_query($con,$sql2);
          mkdir("F:\\\\_Marwan Documents\\Data Management\\Xampp\\htdocs\\Marketplace1\\product_images\\$ID");
          $fileCount = count($myFile["name"]);
          for ($i = 0; $i < $fileCount; $i++) {
                    $img_num = $i+1  . ".jpg";
                    $sql3 = "INSERT INTO product_image (product_id, image_name) VALUES ($ID, '$img_num')";
                    echo $sql3;
                    $result3 = mysqli_query($con,$sql3);
                    move_uploaded_file($myFile["tmp_name"][$i], "F:\\\\_Marwan Documents\\Data Management\\Xampp\\htdocs\\Marketplace1\\product_images\\$ID\\$img_num");
                }
          }
	}


function addP($con){
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$sql = "INSERT INTO products (name, price, stock) VALUES ('$name', $price, $stock)";

$result = mysqli_query($con,$sql);
$ID = mysqli_insert_id($con);

if (isset($_FILES['my_file'])) {
        $myFile = $_FILES['my_file'];
        $fileCount = count($myFile["name"]);
        mkdir("F:\\\\_Marwan Documents\\Data Management\\Xampp\\htdocs\\Marketplace1\\product_images\\$ID");
            for ($i = 0; $i < $fileCount; $i++) {
                    $img_num = $i+1  . ".jpg";
                    $sql3 = "INSERT INTO product_image (product_id, image_name) VALUES ($ID, '$img_num')";
                    $result3 = mysqli_query($con,$sql3);
                    move_uploaded_file($myFile["tmp_name"][$i], "F:\\\\_Marwan Documents\\Data Management\\Xampp\\htdocs\\Marketplace1\\product_images\\$ID\\$img_num");
                }
            }
}
if ($_POST['submit'] == "Add") {

	addP($con);
}
elseif($_POST['submit'] == "Edit"){
    editP($con);
}
header("Location: ../viewProducts");

mysqli_close($con);
?>