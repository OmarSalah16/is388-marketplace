function showOrders() {
  if (selectCheck()) {
    return;
  }
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
}
function selectCheck(){
  var bar = document.getElementById("searchBar").value;
  var error = document.getElementById("error");
  var select = document.getElementById("searchBy");
  // if (isNumber(bar)) {alert("test");}
  if (select.value == "ID" || select.value == "customer_id" && bar != "" ) {
      if (isNaN(bar)) {
      error.innerHTML = "Please enter a numba";
      return true;
    }
  
  else{
      error.innerHTML = "";
      return false;
  }
    }
   }
