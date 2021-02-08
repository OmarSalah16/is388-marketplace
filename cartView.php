<?php
session_start();
// $_SESSION['cart'] = [1,2,3];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Cart</title>
    <script src="js/cart.js"></script>
  </head>
<body onload="showCart()">
    <h2>My Cart</h2>
<div id="viewCart">
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
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
