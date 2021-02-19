function getGet(){
  var parts = window.location.search.substr(1).split("&");
  var $_GET = {};
  for (var i = 0; i < parts.length; i++) {
      var temp = parts[i].split("=");
      $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
  }
  return $_GET;
}

function showClients(){
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/clients.php?q=show&select="+select+"&bar="+bar,true);
  xmlhttp.send();
}

function viewClient() {
  var $_GET = getGet();
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/clients.php?select="+"&q=view&id="+$_GET['id'],true);
  xmlhttp.send();
}
