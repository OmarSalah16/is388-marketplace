function showAdmins() {
  var elements = document.getElementsByClassName("form");
  var formData = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formData.append(elements[i].name, elements[i].value);
  }
  formData.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/admins.php",true);
  xmlhttp.send(formData);
}

function deleteAdmin(id){
  var formData = new FormData();
  formData.append('ID', id);
  formData.append('q', 'del');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showAdmins();
    }
  }
  xmlhttp.open("POST","php/admins.php",true);
  xmlhttp.send(formData);
}

function addAdmin(){
  var elements = document.getElementsByClassName("form");
  var formData = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formData.append(elements[i].name, elements[i].value);
  }
  formData.append('q', 'add');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      view_add();
      showAdmins();
    }
  }
  xmlhttp.open("POST","php/admins.php",true);
  xmlhttp.send(formData);
}

function view_add(){
  var add = document.getElementById("addAdmin");
  var view = document.getElementById("viewAdmin");
  var btn = document.getElementById("addBtn");
  if (add.style.display === "none") {
    add.style.display = "block";
    view.style.display = "none";
    btn.innerHTML = "View Admins"
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
