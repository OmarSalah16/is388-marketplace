function showCart() {
  var data = new FormData();
  data.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/cart.php",true);
  xmlhttp.send(data);
}

function remove(id){
  var data = new FormData();
  data.append('q', 'remove');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showCart();
    }
  }
  xmlhttp.open("POST","php/cart.php",true);
  xmlhttp.send(data);
}
