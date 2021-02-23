<html>
  <head>
    <meta charset="utf-8">
    <title>Orders</title>
    <script src="js/orders.js"></script>
    <link rel="stylesheet" href="css/minmax.css">

  </head>
<body onload="showOrders()">
    <h1><u>Orders</u></h1><br>
<h4 id="error"></h4>
<div class="viewOrder">
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" class="data" placeholder="Search for Order.." oninput="showOrders()"
    <?php if(isset($_GET['id'])){echo "value='$_GET[id]'";} ?>>
    <select name="searchBy" id="searchBy" name="searchBy" class="data" onchange="showOrders()" style="width:120px;">
      <option value="customer_id" >Customer ID</option>
      <option value="ID" >ID</option>
      <option value="products" >Product Name</option>
      <option value="status">Status</option>
    </select>
    from
      <input  type="number" value="0" min="0" max="25000" onchange="showOrders()">    to
      <input  type="number" value="25000" min="0" max="25000" onchange="showOrders()">
      <input id="min" class="data" name="min" value="0" min="0" max="25000" step="1" type="range" onchange="showOrders()">
      <input id="max" class="data" name="max" value="25000" min="0" max="25000" step="1" type="range" onchange="showOrders()">

    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Customer ID</strong></th>
          <th><strong>Products</strong></th>
          <th><strong>Quantities</strong></th>
          <th><strong>Total Price</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Date</strong></th>

        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script  src="js/minmax.js"></script>
  </body>
</html>

<style media="screen">
*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/delivery.jpg);
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

h1{
  color:white;
  margin-left: 45%;
}

table{
  background-color: lightgrey;
}
</style>
