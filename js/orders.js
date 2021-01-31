function showOrders() {
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var range1 = document.getElementById("min").value;
  var range2 = document.getElementById("max").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/orders.php?select="+select+"&bar="+bar+"&q=view&range1="+range1+"&range2="+range2,true);
  xmlhttp.send();
}

function deleteOrder(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showOrders();
    }
  }
  xmlhttp.open("GET","php/orders.php?ID="+id+"&q=del",true);
  xmlhttp.send();
}

function view_add(){
  var add = document.getElementById("addOrder");
  var view = document.getElementById("viewOrder");
  var btn = document.getElementById("addBtn");
  document.getElementById("submitABtn").style.display = "block";
  document.getElementById("submitEBtn").style.display = "none";
  // if (add.style.display === "none") {
  //   add.style.display = "block";
  //   view.style.display = "none";
  //   btn.innerHTML = "View Orders"
  // }
  // else {
  //   add.style.display = "none";
  //   view.style.display = "block";
  //   btn.innerHTML = "Add Product"
  // }
}
