<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <?php include "customerMenu.php"; ?>
  </head>
  <body>
    <div class="contact">
      <h1>Contact Us</h1>
      <div class="txtb">
        <input type="text" name="name" value="" placeholder="Full Name">
      </div>
      <div class="txtb">
        <input type="text" name="email" value="" placeholder="Email">
      </div>
      <div class="txtb">
        <input type="text" name="" value="" placeholder="Mobile Number">
      </div>
      <div class="txtb">
        <textarea name="message" placeholder="Enter your message.."></textarea>
      </div>
      <a class="btn">SEND</a>
    </div>
  </body>
</html>

<style media="screen">

  body{
    margin:0;
    padding:0;
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/interview.jpg);
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
    height:100vh;
    font-family: Century Gothic;
  }

  .contact{
    width: 85%;
    max-width:600px;
    background: #f1f1f1;
    position: absolute;
    left:75%;
    top: -10%;
    transform: translate(-50%,50%);
    padding: 30px 40px;
    box-sizing: border-box;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 0 20px #000000b3;
  }

  .contact h1{
    margin-top: 0;
    font-weight: 200;
  }

  .txtb{
    border: 1px solid gray;
    margin: 8px 0;
    padding: 12px 18px;
    border-radius: 8px;
  }

  .txtb input, .txtb textarea{
    width: 100%;
    border: none;
    background: none;
    outline:none;
    font-size: 18px;
    margin-top: 6px;
  }

  .btn{
    border-radius: 8px;
    display:block;
    background: orange;
    padding: 14px 0;
    color: white;
    text-transform: uppercase;
    cursor: pointer;
    margin-top: 8px;
    width: 100%;
    transition: 0.6s ease;
  }

  .btn:hover{
    background: teal;
  }
</style>
