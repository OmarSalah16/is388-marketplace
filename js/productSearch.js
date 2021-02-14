function showProducts() {
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var range1 = document.getElementById("range1").value;
  var range2 = document.getElementById("range2").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/productSearch.php?select="+select+"&bar="+bar+"&q=view&range1="+range1+"&range2="+range2,true);
  xmlhttp.send();
}

function addToCart(id){
  var quantity = document.getElementById(id).value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      showProducts()
      }
  }
  xmlhttp.open("GET","php/productSearch.php?ID="+id+"&quantity="+quantity+"&q=cart",true);
  xmlhttp.send();
}


function viewProduct(id){
  window.location.href = "product.php?ID="+id;
}
