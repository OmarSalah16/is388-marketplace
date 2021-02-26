function showProfile() {
  var formData = new FormData();
  formData.append('q', 'view');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/clientProfile.php",true);
  xmlhttp.send(formData);
}

function viewOrder(id){
  window.location.href = "viewOrderC.php?&q=view&id="+id;
}

function writeReview(id){
  window.location.href = "review.php?ID="+id;
}

var globalID;
function editProfile(id,name,price,stock) {
  document.getElementById("name").value = name;
  document.getElementById("mobile").value = price;
  document.getElementById("username").value = stock;
  globalID = id;
  view_add();
  document.getElementById("submitABtn").style.display = "none";
  document.getElementById("submitEBtn").style.display = "block";
}

function validateEdit(){
  var errors = "";
  var flag = false;
  var lowerCaseLetters = /[a-z]/g;
  var email = document.getElementById("email").value;
  var mobile = document.getElementById("mobile").value;
  var name = document.getElementById("name").value;
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
  if (flag) {
    alert(errors);
    return false;
  }
   return true;

}

function submitEdit(){
  if (!validateEdit()) {
    return;
  }
  var elements = document.getElementsByClassName("form");
  var formData = new FormData();
  for (var i = 0; i < elements.length; i++) {
    formData.append(elements[i].name, elements[i].value);
    console.log(elements[i].name + " " + elements[i].value);
  }
  formData.append('q', 'edit');
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {

    if (this.readyState==4 && this.status==200) {
      view_add();
      showProfile();
      document.getElementById("error").innerHTML = this.responseText;
    }
  }
  xmlhttp.open("POST","php/clientProfile.php",true);
  xmlhttp.send(formData);
}

function view_add(){
  var add = document.getElementById("addProfile");
  var view = document.getElementById("viewProfile");
  var btn = document.getElementById("addBtn");
  document.getElementById("submitABtn").style.display = "block";
  if (add.style.display === "none") {
    add.style.display = "block";
    view.style.display = "none";
    btn.innerHTML = "View Profile"
  }
  else {
    add.style.display = "none";
    view.style.display = "block";
    btn.innerHTML = "Edit Profile"
  }
}
