function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/login.php?username="+username+"&password="+password+"&q=login",true);
  xmlhttp.send();
}

function signup() {
  var select = document.getElementById("searchBy").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/productSearch.php?select="+select+"&bar="+bar+"&q=view&range1="+range1+"&range2="+range2,true);
  xmlhttp.send();
}





