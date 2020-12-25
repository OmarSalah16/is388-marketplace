<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
  </head>
  <body>
    <header>
      <div class="main">
        <div class="logo">
          <img src="" alt="">
        </div>

        <ul>
          <li class = "active"><a href = "#">Home</a></li>
          <li><a href = "#">Profile</a></li>
          <li><a href = "customerContact.php">Contact</a></li>
          <li> <a href="#">SEARCH</a> </li>
          <li> <input type="text" name="search" placeholder="Enter product name.."> </li>
        </ul>
      </div>

      <div class="subtitle">
        <h2>BEST.NEWS.EVER.</h2>
      </div>

      <div class="title">
        <h1>NOW YOU CAN</h1><br>
        <h1>SHOP ONLINE</h1>
      </div>

      <div class="button">
        <a href="#" class="btn">BROWSE NOW</a>
      </div>

      <div class="slideshow"></div>

      <div class="arrival">
        <h3>Winter Collection 2021</h3>
        <h2> NEW ARRIVALS</h3>
      </div>
    </header>
  </body>
</html>

<style media="screen">

  *{
    margin:0;
    padding:0;
    font-family: Century Gothic;
  }

  header{
    background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(background2.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
  }

  ul{
    float: right;
    list-style-type: none;
    margin-top: 25px;
    margin-right: 50px;
  }

  ul li{
    display: inline-block;
  }

  ul li a{
    border-radius: 8px;
    text-decoration: none;
    color:#fff;
    padding: 5px 20px;
    border: 1px solid #fff transparent;
    transition: 0.6s ease;
  }

  ul li a:hover{
    background-color: #fff;
    color: #000;
  }

  ul li.active a{
    background-color: #fff;
    color: #000;
  }

  ul li input{
    text-decoration: none;
    color:teal;
    padding: 5px 20px;
  }


  .logo img{
    margin-top: 10px;
    margin-left: 20px;
    float:left;
    width: 100px;
    height: auto;
  }

  .title{
    position: absolute;
    top:25%;
    left:50%;
    transform: translate(-50%, -50%);
  }

  .title h1{
    color: hotpink;
    font-size: 50px;
    text-align:center;
  }

  .subtitle{
    position: absolute;
    top:12%;
    left:50%;
    transform: translate(-50%, -50%);
  }

  .subtitle h2{
    color: #fff;
    font-size: 30px;
    text-align:center;
  }

  .arrival{
      position: absolute;
      top:60%;
      left:75%;
      transform: translate(-50%, -50%);
  }

  .arrival h2{
    color: #fff;
    font-size: 30px;
    text-align:center;
  }

  .arrival h3{
    color: yellow;
    font-size: 45px;
    text-align:center;
  }

  .button{
    position: absolute;
    top:80%;
    left:75%;
    transform: translate(-50%, -50%);
  }

  .btn{
    border-radius: 8px;
    border: 1px solid #fff;
    padding: 10px 30px;
    color: #fff;
    text-decoration: none;
    transition: 0.6s ease;
  }

  .btn:hover{
    background-color: #fff;
    color:#000;
  }

.slideshow{
  width: 40%;
  height: 350px;
  position: relative;
  left: 22%;
  top:20%;
  transform:translate(-50%, 50%);
  background-image: url('img1.jpg');
  background-size: 100% 100%;
  box-shadow: 1px 2px 10px 10px white;
  animation: slider 9s infinite linear;
}

@keyframes slider {
  0%{background-image: url('img1.jpg');}
  20%{background-image: url('img2.jpg');}
  40%{background-image: url('img6.jpg');}
  60%{background-image: url('img4.jpg');}
  80%{background-image: url('img5.jpg');}
}
</style>
