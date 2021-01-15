<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    if(isset($_POST["Submit"])){
      $con = mysqli_connect('localhost','root','','marketplace');
      if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
      $sql = "INSERT INTO products ( name, price, stock, rating) VALUES ('$_POST[name]','$_POST[price]','$_POST[stock]','0')";
      $result=mysqli_query($con,$sql);
      if($result)
  		{
        $root = dirname( dirname(__FILE__) );
  			header("Location:viewProducts.php");
  		}
  		else
  		{
  			echo $sql;
      }
    }
      ?>
  </head>
  <body>
    <a href="viewProducts.php">Back</a> <br>
    <form class="addP" action="" method="post">
      <input type="text" name="name" value="" required>
      <input type="number" name="price" value="1" step = "0.01" min = "1">
      <input type="number" name="stock" value="1" min = "1">
      <input type="submit" value="Submit" name="Submit">
    </form>

  </body>
</html>
