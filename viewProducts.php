<?php
session_start();
include "adminVerification.php";
include "php/dbhandler.php";
include "cartInit.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Products</title>
    <script src="js/viewProducts.js"></script>
  </head>
<body onload="showProducts()">
    <h2>Products</h2>
    <button type="button" id="addBtn" onclick="view_add()">Add Product</button>
    <div id="addProduct" style="display: none">
      <form class="addP" action="php/addProduct.php" method="post" enctype="multipart/form-data">
        <label for="name">Name</label> <input type="text" name="name" id="name" class="form" required>
        <br>
        <label for="price">Price</label> <input type="number" name="price" class="form" id="price" value="1" step="0.01" min="1" required> <br>
        <label for="stock">Stock</label> <input type="number" name="stock" class="form" id="stock" value="1" min="1" required>
         <br>
        <input type="file" name="my_file[]" class="form" accept="image/x-png,image/jpeg" multiple >
         <br>
        <input type="text" name="q" id="q" style="display: none">
        <input type="submit" value="Add" id="submitA" name="submit">
        <input type="submit" value="Edit" id="submitE" name="submit">

      </form>
    </div>

<div id="viewProduct">
    <label for=""></label> <input type="text" name="searchBar" class="form" id="searchBar" oninput="showProducts()">
    <select name="searchBy" id="searchBy" class="form" onchange="showProducts()">
      <option value="ID">ID</option>
      <option value="name">name</option>
      <option value="price">price</option>
      <option value="stock">stock</option>
      <option value="rating">rating</option>
    </select>

    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <!-- <th><strong>Image</strong></th> -->
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
  </body>
</html>
