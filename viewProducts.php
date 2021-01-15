<html>
  <head>
    <meta charset="utf-8">
    <title>View Products</title>
    <script>
    function showProducts() {
      var select = document.getElementById("searchBy").value;
      var bar = document.getElementById("searchBar").value;
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("rTable").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","php/products.php?select="+select+"&bar="+bar,true);
      xmlhttp.send();
    }
    function deleteProduct(id){
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("rTable").innerHTML=this.responseText;
          showProducts();
        }
      }
      xmlhttp.open("GET","php/deleteProduct.php?ID="+id,true);
      xmlhttp.send();
    }
    </script>
  </head>
<body onload="showProducts()">
  <div class="form">
    <h2>View Products</h2>
    <a href="addProduct.php">Add Product</a> <br>
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" oninput="showProducts()">
    <select name="searchBy" id="searchBy" onchange="showProducts()">
      <option value="ID">ID</option>
      <option value="name">name</option>
      <option value="price">price</option>
      <option value="stock">stock</option>
      <option value="rating">rating</option>
    </select>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Name</strong></th>
          <th><strong>price</strong></th>
          <th><strong>stock</strong></th>
          <th><strong>rating</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
  </div>
  </body>
</html>
