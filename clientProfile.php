<html>
  <head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <script src="js/clientProfile.js"></script>
  </head>
  <style type="text/css">
    img{
      height: 100px;
  width: 200px;
    }
  </style>
<body onload="showProfile()">
<h2>My Profile</h2>
    <button type="button" id="addBtn" onclick="view_add()">Edit Profile</button>
    <div id="addProduct" style="display: none">
      <form class="addP" action="" method="post">
        <label for="name">Name</label> <input type="text" name="name" id="name" value="" required> <br>
        <label for="price">Mobile</label> <input type="number" name="mobile" id="mobile"  required> <br>
        <label for="stock">Username</label> <input type="text" name="username" id="username"   required> <br>
        <button type="button" name="submitABtn" id="submitABtn" onclick="submitEdit()">Submit</button>
        <button type="button" name="submitEBtn" id="submitEBtn" style="display: none;" onclick="submitEdit()">SubmitE</button>
      </form>
    </div>

<div id="viewProduct">
    <table width="100%" border="1" style="border-collapse:collapse;">
      <tbody id="rTable">
      </tbody>
    </table>

</div>
<div id="rTable" style="display: none;">
      <form class="review" action="" method="post">
        <label for="review">Review</label> <br><textarea id="review"></textarea> <br>
        <label for="rating">Rating</label><br> <input type="number" name="stock" id="rating" value="1" min = "1" max="5" required> <br>
        <button type="button" name="submitABtn" id="submitABtn" onclick="review()">Submit</button>
      </form>
    </div>

    <form class="addP" action="php/upload.php" method="post" enctype="multipart/form-data">
        <label for="stock">Change Picture</label>
        <input type="file" name="file" id="file" accept="image/x-png,image/jpeg">
        <input type="submit" name="submit" value="Start Upload">
      </form>

  </body>
</html>
