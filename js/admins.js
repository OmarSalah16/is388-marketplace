function showAdmins() {
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/admins.php?select="+select+"&bar="+bar+"&q=view",true);
  xmlhttp.send();
}

function deleteAdmin(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showAdmins();
    }
  }
  xmlhttp.open("GET","php/admins.php?ID="+id+"&q=del",true);
  xmlhttp.send();
}

function addAdmin(){
  var username = document.getElementById("username").value;
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var mobile = document.getElementById("mobile").value;
  var rank = document.getElementById("rank").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      view_add();
      showAdmins();
    }
  }
  xmlhttp.open("GET","php/admins.php?username="+username+"&name="+name+"&password="+password+"&mobile="+mobile+"&rank="+rank+"&email="+email+"&q=add",true);
  xmlhttp.send();
}

function view_add(){
  var add = document.getElementById("addAdmin");
  var view = document.getElementById("viewAdmin");
  var btn = document.getElementById("addBtn");
  if (add.style.display === "none") {
    add.style.display = "block";
    view.style.display = "none";
    btn.innerHTML = "View Admins"
    var username = document.getElementById("username").value = "";
    var name = document.getElementById("name").value = "";
    var email = document.getElementById("email").value = "";
    var password = document.getElementById("password").value = "";
    var mobile = document.getElementById("mobile").value = "";
  }
  else {
    add.style.display = "none";
    view.style.display = "block";
    btn.innerHTML = "Add Admin"
  }
}
