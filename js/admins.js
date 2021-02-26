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

function validateAdd(){
  var errors = "";
  var flag = false;
  var lowerCaseLetters = /[a-z]/g;
  var rank = document.getElementById("rank").value;
  var email = document.getElementById("email").value;
  var mobile = document.getElementById("mobile").value;
  var password = document.getElementById("password").value;
  var name = document.getElementById("name").value;
  if (rank < 0 || rank > 9 ) {
    errors = errors.concat("Invalid Rank\n");
    flag = true;
  }
  if (name == "") {
    errors = errors.concat("Please Enter a Name\n");
    flag = true;
  }
  if (mobile.length != 11) {
    errors = errors.concat("Invalid Mobile Number\n");
    flag = true;
  }
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(String(email).toLowerCase()))
  {
    errors = errors.concat("Invalid Email\n");
    flag = true;
  }
  var lowerCaseLetters = /[a-z]/g;
  if(!password.match(lowerCaseLetters)) {
    errors = errors.concat("Password must include lower case letters\n");
    flag = true; 
  }
  var upperCaseLetters = /[A-Z]/g;
  if(!password.match(upperCaseLetters)) {
    errors = errors.concat("Password must include upper case letters\n");
    flag = true;
  }
  var numbers = /[0-9]/g;
  if(!password.match(numbers)) {
    errors = errors.concat("Password must include numbers\n");
    flag = true;
  }
  var special = /[$-/:-?{-~!"^_`\[\]]/g;
  if(!password.match(special)) {
    errors = errors.concat("Password must include special characters\n");
    flag = true;
  }
  if(password.length < 8 || password.length > 255) {
    errors = errors.concat("Password must be at least 8 characters and maximum 255 characters\n");
    flag = true;
  }
  if (flag) {
    alert(errors);
    return false;
  }
   return true;

}

function addAdmin(){
  if (!validateAdd()) {
    return;
  }
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
