<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
  </head>
  <body>
    <form class="box" action="login.php" method="post">
      <h1>Sign Up Now</h1>
      <input type="text" name="" placeholder="Name">
      <input type="text" name="" placeholder="Email">
      <input type="text" name="" placeholder="Mobile Number">
      <input type="text" name="" placeholder="Address">
      <input type="password" name="" placeholder="Password">
      <input type="password" name="" placeholder="Confirm Password">
      <input type="submit" name="" value="Register">
    </form>
  </body>
</html>

<style media="screen">

  body{
    margin:0;
    padding:0;
    font-family: Century Gothic;
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/register.jpg);
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    height:100vh;
  }

  .box{
    width:300px;
    padding: 40px;
    position: absolute;
    left:20%;
    bottom: 50%;
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


</style>
