<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <form class="box" action="customerHome.php"method="post">
      <h1>Login</h1>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" value="Login" >
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

  .box input[type="text"], .box input[type="password"]{
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
