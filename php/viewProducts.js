function showProducts() {
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/viewProducts.php?select="+select+"&bar="+bar+"&q=view",true);
  xmlhttp.send();
}

function deleteProduct(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      showProducts();
    }
  }
  xmlhttp.open("GET","php/viewProducts.php?ID="+id+"&q=del",true);
  xmlhttp.send();
}

function addProduct(){
  var name = document.getElementById("name").value;
  var price = document.getElementById("price").value;
  var stock = document.getElementById("stock").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      view_add();
      showProducts();
    }
  }
  xmlhttp.open("GET","php/viewProducts.php?name="+name+"&price="+price+"&stock="+stock+"&q=add",true);
  xmlhttp.send();
}

var globalID;

function editProduct(id,name,price,stock) {
  document.getElementById("name").value = name;
  document.getElementById("price").value = price;
  document.getElementById("stock").value = stock;
  document.getElementById("q").value = id;
  view_add();
  document.getElementById("submitA").style.display = "none";
  document.getElementById("submitE").style.display = "block";

}

// function submitEdit(){
//   var name = document.getElementById("name").value;
//   var price = document.getElementById("price").value;
//   var stock = document.getElementById("stock").value;
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {

//     if (this.readyState==4 && this.status==200) {
//       view_add();
//       document.getElementById("error").innerHTML=this.responseText;
//       showProducts();
//     }
//   }
//   xmlhttp.open("GET","php/viewProducts.php?name="+name+"&price="+price+"&stock="+stock+"&id="+globalID+"&q=edit",true);
//   xmlhttp.send();
// }

function view_add(){
  var add = document.getElementById("addProduct");
  var view = document.getElementById("viewProduct");
  var btn = document.getElementById("addBtn");
  document.getElementById("submitE").style.display = "none";
  document.getElementById("submitA").style.display = "block";
  if (add.style.display === "none") {
    add.style.display = "block";
    view.style.display = "none";
    btn.innerHTML = "View Products"
  }
  else {
    add.style.display = "none";
    view.style.display = "block";
    btn.innerHTML = "Add Product"
  }
}
