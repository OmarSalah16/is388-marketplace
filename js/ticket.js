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
  var content = document.getElementById("content").value;
  var data = new FormData();
  data.append('content', content);
  data.append('q', 'response');
  var $_GET = getGet();
  var ID = $_GET['id'];
  data.append('id', ID);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("content").value="";
        displayTicket();
    }
  }
  xmlhttp.open("POST","php/ticket.php",true);
  xmlhttp.send(data);
}

function closeTicket(ID){
  var content = document.getElementById("content").value;
  var data = new FormData();
  data.append('q', 'close');
  data.append('ID', ID);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      displayTicket();
    }
  }
  xmlhttp.open("POST","php/ticket.php",true);
  xmlhttp.send(data);
}

function addComment() {
  var comment = document.getElementById("comment").value;
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
  var data = new FormData();
  data.append('comment', comment);
  data.append('q', 'comment');
  data.append('id', id);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("comment").value="";
      displayATicket();
    }
  }
  xmlhttp.open("POST","php/ticket.php",true);
  xmlhttp.send(data);
}

function report(id){
  var ID = id;
  var data = new FormData();
  data.append('q', 'report');
  data.append('id', ID);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      displayATicket();
    }
  }
  xmlhttp.open("POST","php/ticket.php",true);
  xmlhttp.send(data);
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
  var comment = document.getElementById("comment").value;
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
  var data = new FormData();
  data.append('q', 'penalty');
  data.append('id', id);
  data.append('comment', comment);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("error").innerHTML=this.responseText;
      document.getElementById("comment").value="";
      displayReport();
    }
  }
  xmlhttp.open("POST","php/ticket.php",true);
  xmlhttp.send(data);
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
