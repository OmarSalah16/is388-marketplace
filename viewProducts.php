<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Products</title>
    <script src="js/viewProducts.js"></script>
  </head>
  <?php
  session_start();
  include "adminVerification.php";
  include "cartInit.php";
  include "navbar.php";
  include "php/dbhandler.php";
  include 'php/customError.php';
  ?>
<body onload="showProducts()">
    <h1><u>Products</u></h1>

    <div id="addProduct" style="display: none">
      <form class="addP" action="php/addProduct.php" method="post" enctype="multipart/form-data">
        <label for="name">Name</label> <input type="text" name="name" id="name" class="form" required>
        <br><br>
        <label for="price">Price</label> <input type="number" name="price" class="form" id="price" value="1" step="0.01" min="1" required style="margin-left:4.5px;">
        <br><br>
        <label for="stock">Stock</label> <input type="number" name="stock" class="form" id="stock" value="1" min="1" required>
         <br><br>
        <input type="file" name="my_file[]" class="form" accept="image/x-png,image/jpeg" multiple >
         <br>
        <input type="text" name="q" id="q" style="display: none">
        <input type="submit" class="submitProduct" value="Add" id="submitA" name="submit">
        <input type="submit" value="Edit" id="submitE" name="submit" value='Submit Product'>

      </form>
    </div>

<div id="viewProduct">
    <label for=""></label> <input type="text" name="searchBar" class="form" id="searchBar" oninput="showProducts()" placeholder="Search for product..">
    <select name="searchBy" id="searchBy" class="form" onchange="showProducts()">
      <option value="ID">ID</option>
      <option value="name">Name</option>
      <option value="price">Price</option>
      <option value="stock">Stock</option>
      <option value="rating">Rating</option>
    </select>

    <table width="100%" border="1" style="border-collapse:collapse;" class="table table-hover">
      <thead>
        <tr>
          <!-- <th><strong>Image</strong></th> -->
          <th></th>
          <th><strong>ID</strong></th>
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
<button type="button" class="addButton" id="addBtn" onclick="view_add()">Add Product</button>
  </body>
</html>

<style media="screen">

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg6.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }

  h1{
    color:white;
    margin-left: 45%;
  }

.addButton{
  border:0;
  background: none;
  display: block;
  margin: auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

button:hover{
  background: #3498db;
}

.submitProduct{
  border:0;
  margin-left: 30px;
  background: none;
  display: block;
  text-align: center;
  border: 2px solid red;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

.submitProduct:hover{
  background: red;

}

td,th{
  text-align: center;
}

</style>
