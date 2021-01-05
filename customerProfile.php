<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <?php include "customerMenu.php"; ?>
  </head>
  <body>
    <form class="box" action="login.php" method="post">
      <h1>Profile Details</h1>
      <input type="text" name="name" placeholder="Name">
      <input type="text" name="email" placeholder="Email">
      <input type="text" name="mobile" placeholder="Mobile Number">
      <input type="text" name="address" placeholder="Address">
      <input type="text" name="password" placeholder="Password">
      <input type="file" name="pic">
      <input type="submit" name="submit" value="Update">
    </form>

    <div class="profilePic">
      <h2>Profile Picture</h2>
      <img src="pics/register.jpg" alt="Profile Pic">
    </div>
  </body>
</html>

<style media="screen">

  body{
    margin:0;
    padding:0;
    font-family: Century Gothic;
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/profile.jpg);
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    height:100vh;
  }

  .profilePic{
    width:300px;
    padding: 30px;
    position: absolute;
    left:75%;
    bottom: 45%;
    transform: translate(-50%, 50%);
    background: #000026;
    text-align: center;
    border-radius: 24px;
  }

  .profilePic h2{
    color:white;
    text-transform: uppercase;
    font-weight: 500;
  }

  .profilePic img{
    width:250px;
    height:250px;
  }

  .box{
    width:300px;
    padding: 30px;
    position: absolute;
    left:50%;
    bottom: 45%;
    transform: translate(-50%, 50%);
    background: #000026;
    text-align: center;
    border-radius: 24px;
  }

  .box h1{
    color:white;
    text-transform: uppercase;
    font-weight: 500;
  }

  .box input[type="file"]{

  }

  .box input[type="text"], .box input[type="file"]{
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

  .box input[type="text"]:focus,.box input[type="file"]:focus{
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
