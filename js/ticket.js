function viewTickets(myFlag) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  if(myFlag) {xmlhttp.open("GET","php/ticket.php?&q=viewm",true);}
  else{xmlhttp.open("GET","php/ticket.php?q=view",true);}
  xmlhttp.send();
}

function getGet(){
  var parts = window.location.search.substr(1).split("&");
  var $_GET = {};
  for (var i = 0; i < parts.length; i++) {
      var temp = parts[i].split("=");
      $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
  }
  return $_GET;
}

function displayTicket(){
  var $_GET = getGet();
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=display&id="+$_GET['id'],true);
  xmlhttp.send();
}

function sendResponse(){
  var $_GET = getGet();
  var content = document.getElementById("content").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;

        displayTicket();
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=response&content="+content+"&id="+$_GET['id'],true);
  xmlhttp.send();

}
