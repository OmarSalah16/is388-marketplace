<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <script src="js/loginsignup.js"></script>
     <script type="text/javascript">
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
}</script>
  </head>
  <body>
    <form class="box" method="post">
      <h1>Sign up</h1>
      <input type="text" name="username" id="username" placeholder="Username">
      <input type="email" name="email" id="email" placeholder="email">
      <input type="number" name="mobile" id="mobile" placeholder="mobile">
      <input type="text" name="address" id="address" placeholder="address">
      <input type="password" name="password" id="password" placeholder="password">
      <input type="password" name="Cpassword" id="Cpassword" placeholder="Confirm Password">
      <button type="button" id="submit" onclick="signup()">Login</button>
      <a href="register.php">Sign Up</a>
    </form>

  </body>
</html>

<style media="screen">

  body{
    margin:0;
    padding:0;
    font-family: Century Gothic;
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/shopping.jpg);
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    height:100vh;
  }

  .box{
    width:300px;
    padding: 40px;
    position: absolute;
    left:50%;
    transform: translate(-50%, 50%);
    background: #191919;
    text-align: center;
    border-radius: 24px;
  }

  .box h1{
    color:white;
    text-transform: uppercase;
    font-weight: 500;
  }

  .box input[type="text"], .box input[type="password"], .box input[type="email"], .box input[type="number"]{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
  }

  .box input[type="text"]:focus, .box input[type="password"]:focus{
    width: 280px;
    border-color: #2ecc71;
  }

  .box input[type="submit"]{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
  }

  .box input[type="submit"]:hover{
    background: #2ecc71;
  }

  .box input[type="submit"].signup{
    border: 2px solid orange;
  }

  .box input[type="submit"].signup:hover{
    background: orange;
  }

  a{
    border-radius: 24px;
    text-decoration: none;
    color:#fff;
    padding: 5px 20px;
    border: 1px solid #fff;
    transition: 0.6s ease;
  }

  a:hover{
    background-color: #fff;
    color: #000;
  }

</style>
