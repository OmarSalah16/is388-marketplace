<?php
session_start();
include "cartInit.php";
include "customerMenu.php";
include 'php/customError.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="css/minmax.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Products</title><script src="js/productSearch.js"></script>
  </head>
<body onload="showProducts()">
  <div class="viewPage">
    <h1><u>Products</u></h1>
    <div id="error"></div>
    <a href="checkout">My Cart</a>
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" class="form" oninput="showProducts()">
    <select name="searchBy" id="searchBy" class="form" onchange="selectChange()">
      <option value="Name" >Name</option>
      <option value="rating" >Rating</option>
    </select>
    <?php
      include 'php/dbhandler.php';
      $sql = "SELECT MIN(price) AS min, MAX(price) AS max from products";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      $min = intval ($row['min']);
      $max = intval ($row['max']);
     ?>
    from
      <input class="form" type="number" name="min" value=<?php echo $min;?> min=<?php echo $min;?>  max=<?php echo $max;?> onchange="showProducts()">    to
      <input class="form" type="number" name="max" value=<?php echo $max;?> min=<?php echo $min;?> max=<?php echo $max;?>  onchange="showProducts()">
      <input id="min" class="data" style="width: 250px; margin-left:330px;"  value=<?php echo $min;?> min=<?php echo $min;?> <?php echo $max;?> step="1" type="range" onchange="showProducts()">
      <input id="max" class="data" style="width: 250px; margin-left:330px;" value=<?php echo $max;?> min=<?php echo $min;?> max=<?php echo $max;?> step="1" type="range" onchange="showProducts()">


    <table width="100%" class="table table-hover">
      <thead>
        <tr>
          <th><strong></strong></th>
          <th><strong>Name</strong></th>
          <th><strong>Price</strong></th>
          <th><strong>Stock</strong></th>
          <th><strong>Rating</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
  </div>
</body>
</html>
<script  src="js/minmax.js"></script>
<style media="screen">

a{
    font-size: 25px;
    color:blue;
}

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(pics/bg.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }
  img {
    width: 150px;
    height: 150px;
  }
  .tooltips {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
  }

  .tooltips .tooltiptexts {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 105%;
  }
  .tooltip .tooltiptext {
}
  .tooltips:hover .tooltiptexts {
    visibility: visible;
  }
</style>
