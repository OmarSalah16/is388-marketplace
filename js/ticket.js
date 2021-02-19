function viewTickets(myFlag) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  if(myFlag) {xmlhttp.open("GET","php/ticket.php?&q=viewm",true);}
  else{xmlhttp.open("GET","php/survey.php?q=view",true);}
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

function displayATicket(){
  var $_GET = getGet();
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=displayA&id="+$_GET['id'],true);
  xmlhttp.send();
}

function sendResponse(){
  var $_GET = getGet();
  var content = document.getElementById("content").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("content").value="";
        displayTicket();
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=response&content="+content+"&id="+$_GET['id'],true);
  xmlhttp.send();
}

function addComment() {
  var radios = document.getElementsByName('select');
  var id = false;
  for(i = 0; i < radios.length; i++) {
    if(radios[i].checked){
        id = radios[i].value;
        break;
    }
  }
  if (id == false) {
    alert("Please Select a message!");
    return;
  }
  var comment = document.getElementById("comment").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("comment").value="";
      displayATicket();
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=comment&comment="+comment+"&id="+id,true);
  xmlhttp.send();
}

function report(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      displayATicket();
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=report&id="+id,true);
  xmlhttp.send();
}

function viewReports(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=viewR",true);
  xmlhttp.send();
}

function displayReport(){
  var $_GET = getGet();
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=displayR&id="+$_GET['id'],true);
  xmlhttp.send();
}

function addPenalty() {
  var radios = document.getElementsByName('select');
  var id = false;
  for(i = 0; i < radios.length; i++) {
    if(radios[i].checked){
        id = radios[i].value;
        break;
    }
  }
  if (id == false) {
    alert("Please Select a message!");
    return;
  }
  var comment = document.getElementById("comment").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("comment").value="";
      displayReport();
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=penalty&comment="+comment+"&id="+id,true);
  xmlhttp.send();
}

function viewPenaltys(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=viewP",true);
  xmlhttp.send();
}

function displayPenalty(){
  var $_GET = getGet();
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/ticket.php?q=displayP&id="+$_GET['id'],true);
  xmlhttp.send();
}
