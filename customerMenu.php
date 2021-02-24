<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php  ?>
  <body>
    <header>
      <div class="main">
        <ul>
          <li class = "home"><a href = "customerHome">Home</a></li>
          <li class = "profile"><a href = "clientProfile">Profile</a></li>
          <li class = "cont"><a href = "customerContact">Contact</a></li>
          <li class = "support"><a href = 'support'>Messages</a></li>
          <li class = "survey"><a href = 'clientSurvey'>Surveys</a></li>
          <li> <a href="productSearch">Search</a> </li>
          <li> <a href="logout">Log Out</a> </li> </li>
        </ul>
      </div>
    </header>
  </body>
</html>

<style media="screen">


ul{
  float: right;
  list-style-type: none;
  margin: 0;
  padding: 0;

}

ul li{
  display: inline-block;
}

ul li a{
  border-radius: 8px;
  text-decoration: none;
  color:#fff;
  padding: 5px 10px;
  border: 1px solid #fff transparent;
  transition: 0.6s ease;
  text-align: center;
}

ul li a:hover{
  background-color: #fff;
  color: #000;
}


</style>
