<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php
    session_start();
    include "isLoggedIn.php";
    include "cartInit.php";
    include "customerMenu.php";
    ?>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <script src="js/clientProfile.js"></script>
  </head>
  <body onload="showProfile()">
    <div id = "error"></div>
    <br>
    <h1>My Profile</h1>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">Profile Pic</div>
      <div class="col-sm-4"></div>
    </div>

    <div class="addProfile" id="addProfile" style="display: none;">
      <form class="addP" action="" method="post">
        <a href="changePassword">Change Password</a>
        <br>
        <label for="name">Name</label> <input type="text" name="name" id="name"  class="form" required style="margin-left:5px;"> <br>
        <label for="price">Mobile</label> <input type="number" name="mobile" id="mobile" class="form" required> <br>
        <label for="stock">Email</label> <input type="text" name="email" id="email" class="form" required style="margin-left:12px;"> <br>
        <button type="button" name="submitABtn" id="submitABtn" onclick="submitEdit()">Submit</button>
      </form>
    </div>



    <button type="button" id="addBtn" onclick="view_add()">Edit Profile</button>
  </body>
</html>
