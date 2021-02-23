<html>
  <head>
    <?php include "profileMenu.php"; ?>
    <meta charset="utf-8">
    <title>My Profile</title>
    <script src="js/clientProfile.js"></script>
  </head>
  <style type="text/css">
    img{
        height: 150px;
        width: 200px;
    }
  </style>
<body onload="showProfile()">
  <div id = "error">

  </div>
<h1>My Profile</h1>

    <div class="addProfile" id="addProfile" style="display: none">
      <form class="addP" action="" method="post">
        <br>
        <label for="name">Name</label> <input type="text" name="name" id="name"  class="form" required style="margin-left:5px;"> <br>
        <label for="price">Mobile</label> <input type="number" name="mobile" id="mobile" class="form" required> <br>
        <label for="stock">Email</label> <input type="text" name="email" id="email" class="form" required style="margin-left:12px;"> <br>
        <button type="button" name="submitABtn" id="submitABtn" onclick="submitEdit()">Submit</button>
        <button type="button" name="submitEBtn" id="submitEBtn" style="display: none;" onclick="submitEdit()">SubmitE</button>
      </form>
    </div>

<div id="viewProfile">
    <table width="100%" border="1" style="border-style:groove;">
      <tbody id="rTable">
      </tbody>
    </table>
</div>
      <form class="addP" action="php/upload.php" method="post" enctype="multipart/form-data">
        <label for="stock">Change Picture</label>
        <input type="file" name="file" id="file" accept="image/x-png,image/jpeg">
        <input type="submit" name="submit" value="Start Upload">
      </form>
    <button type="button" id="addBtn" onclick="view_add()">Edit Profile</button>
  </body>
</html>

<style media="screen">

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
  color:white;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/background3.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

button{
  border:0;
  background: none;
  display: block;
  margin: 5px auto;
  text-align: center;
  border: 1px solid #2ecc71;
  padding: 7px 17px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

button:hover{
  background: #2ecc71;
}
input{
  color: black;
}
<<<<<<< HEAD
.addProfile{
  margin-top: 10px;
}
=======
>>>>>>> e0dc89bf84584a7e460d069e2916319a90a9310c
</style>
