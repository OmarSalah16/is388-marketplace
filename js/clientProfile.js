function showProfile() {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/clientProfile.php?select="+"&q=view",true);
  xmlhttp.send();
}

function delProfile(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      showProfile();
    }
  }
  xmlhttp.open("GET","php/clientProfile.php?&q=del",true);
  xmlhttp.send();
}

function submitReview(id,rating,review){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       window.location.href = "clientProfile.php";
    }
  }
  xmlhttp.open("GET","php/clientProfile.php?&q=review&id="+id,true);
  xmlhttp.send();
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

function submitEdit(){
  var name = document.getElementById("name").value;
  var mobile = document.getElementById("mobile").value;
  var username = document.getElementById("username").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {

    if (this.readyState==4 && this.status==200) {
      view_add();
      showProfile();
    }
  }
  xmlhttp.open("GET","php/clientProfile.php?name="+name+"&mobile="+mobile+"&username="+username+"&id="+globalID+"&q=edit",true);
  xmlhttp.send();
}

function view_add(){
  var add = document.getElementById("addProfile");
  var view = document.getElementById("viewProfile");
  var btn = document.getElementById("addBtn");
  document.getElementById("submitABtn").style.display = "block";
  document.getElementById("submitEBtn").style.display = "none";
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
