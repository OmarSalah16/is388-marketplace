function showClients(){
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/clients.php?select="+select+"&bar="+bar,true);
  xmlhttp.send();
}
