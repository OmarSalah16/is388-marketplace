function showProducts() {
  var elements = document.getElementsByClassName("form");
  var formdata = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formdata.append(elements[i].name, elements[i].value);
  }
  formdata.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/productSearch.php",true);
  xmlhttp.send(formdata);
}

function addToCart(id){
  var quantity = document.getElementById(id).value;
  data = new FormData();
  data.append('ID', id);
  data.append('quantity', quantity);
  data.append('q', 'cart');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      showProducts()
      }
  }
  xmlhttp.open("POST","php/productSearch.php",true);
  xmlhttp.send(data);
}


function viewProduct(id){
  window.location.href = "product.php?ID="+id;
}
