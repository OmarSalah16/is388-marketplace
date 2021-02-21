function showOrders() {
  var elements = document.getElementsByClassName("data");
  var data = new FormData();
  for (var i = 0; i < elements.length; i++) {
    data.append(elements[i].name, elements[i].value);
  }
  data.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/orders.php",true);
  xmlhttp.send(data);
}

function deleteOrder(id){
  var data = new FormData();
  data.append('ID', id);
  data.append('q', 'del');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showOrders();
    }
  }
  xmlhttp.open("GET","php/orders.php",true);
  xmlhttp.send(data);
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
