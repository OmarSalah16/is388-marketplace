function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      var response = JSON.parse(xhr.responseText);
      if(response.location){
        window.location.href = response.location;
      }
    }
  }
  xmlhttp.open("GET","php/loginsignup.php?username="+username+"&password="+password+"&q=login",true);
  xmlhttp.send();
}

function signup() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value;
  var address = document.getElementById("address").value;
  var mobile = document.getElementById("mobile").value;
  var Cpassword = document.getElementById("Cpassword").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/loginsignup.php?username="+username+"&password="+password+"&email="+email+"&address="+address+"&mobile="+mobile+"&Cpassword="+Cpassword"&q=signup",true);
  xmlhttp.send();
}
