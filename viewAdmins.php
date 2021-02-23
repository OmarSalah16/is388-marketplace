<html>
  <head>
    <meta charset="utf-8">
    <title>Admins</title>
    <script src="js/admins.js"></script>
    <?php include "adminBar"; ?>
  </head>
<body onload="showAdmins()">
    <h1><u>Admins</u></h1>

    <div id="addAdmin" style="display: none">
      <form class="addP" action="" method="post">
        <!-- <label for="username">Username</label> <input type="text" name="username" id="username" class="form" value="" required > <br><br> -->
        <label for="name">Name</label> <input type="text" name="name" id="name" class="form" value="" required style="margin-left:30px;"> <br><br>
        <label for="email">E-mail</label> <input type="email" name="email" id="email" class="form" value="" required style="margin-left:32px;"> <br><br>
        <label for="password">Password</label> <input type="password" name="password" id="password" class="form" value="" required style="margin-left:5.5px;"> <br><br>
        <label for="mobile">Mobile</label> <input type="text" name="mobile" id="mobile" class="form" value="" required style="margin-left:25px;"> <br><br>
        <label for="rank">Rank</label>
        <select id="rank" name="rank" class="form" style="margin-left:39.5px;">
          <?php
          session_start();
            for($i=$_SESSION['rank'];$i<=9;$i++)
            {
              echo "<option value='$i'>".$i."</option>";
            }
           ?>
        </select> <br><br>
        <button type="button" class="submitAdmin" name="submitBtn" id="submitBtn" onclick="addAdmin()">Submit Admin</button>
      </form>
    </div>

<div id="viewAdmin">
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" class="form" oninput="showAdmins()" placeholder="Search for Admin.." style="margin-left:10px;width:170px;">
    <select name="searchBy" id="searchBy" class="form" onchange="showAdmins()" style="width:70px;">
      <option value="ID">ID</option>
      <option value="name">Name</option>
      <option value="email">Email</option>
      <option value="rank">Rank</option>
    </select>

    <table width="100%" border="1" style="border-collapse:collapse;" c>
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Name</strong></th>
          <th><strong>E-mail</strong></th>
          <th><strong>Rank</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table><br>
</div>
<button type="button" class="addA" id="addBtn" onclick="view_add()">Add Admin</button>
  </body>
</html>

<style media="screen">
*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.3)), url(pics/admins.jpg);
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

h1{
  margin-left: 45%;
  color: white;
}

table{
  background-color: lightgrey;
  margin-top: 10px;
}

.addA{
  border:0;
  background: none;
  display: block;
  margin-left: 10px;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

.addA:hover{
  background: #2ecc71;
}

.submitAdmin{
  border:0;
  background: none;
  display: block;
  text-align: center;
  margin-left: 7px;
  margin-bottom: 5px;
  border: 2px solid blue;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

.submitAdmin:hover{
  background: blue;
}

</style>
