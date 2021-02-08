

function showCart() {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/cart.php?q=view",true);
  xmlhttp.send();
}

function remove(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showCart();
    }
  }
  xmlhttp.open("GET","php/cart.php?ID="+id+"&q=remove",true);
  xmlhttp.send();
}

