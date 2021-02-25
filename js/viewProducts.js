function showProducts() {
  var elements = document.getElementsByClassName("form");
  var formData = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formData.append(elements[i].name, elements[i].value);
  }
  formData.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/viewProducts.php",true);
  xmlhttp.send(formData);
}

function deleteProduct(id){
  var data = new FormData();
  data.append('ID', id);
  data.append('q', 'del');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showProducts();
    }
  }
  xmlhttp.open("POST","php/viewProducts.php",true);
  xmlhttp.send(data);
}

function addProduct(){
  var elements = document.getElementsByClassName("form");
  var formData = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formData.append(elements[i].name, elements[i].value);
  }
  formData.append('q', 'add');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      view_add();
      showProducts();
    }
  }
  xmlhttp.open("POST","php/viewProducts.php",true);
  xmlhttp.send(formData);
}

var globalID;
function editProduct(id,name,price,stock) {
  document.getElementById("name").value = name;
  document.getElementById("price").value = price;
  document.getElementById("stock").value = stock;
  document.getElementById('q').value = id;
  view_add();
  document.getElementById("submitA").style.display = "none";
  document.getElementById("submitE").style.display = "block";
}

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
