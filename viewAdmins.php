<html>
  <head>
    <meta charset="utf-8">
    <title>Admins</title>
    <script src="js/admins.js"></script>
  </head>
<body onload="showAdmins()">
    <h2>Admins</h2>
    <button type="button" id="addBtn" onclick="view_add()">Add Admin</button>
    <div id="addAdmin" style="display: none">
      <form class="addP" action="" method="post">
        <label for="username">Username</label> <input type="text" name="username" id="username" value="" required> <br>
        <label for="name">Name</label> <input type="text" name="name" id="name" value="" required> <br>
        <label for="email">E-mail</label> <input type="email" name="email" id="email" value="" required> <br>
        <label for="password">Password</label> <input type="password" name="password" id="password" value="" required> <br>
        <label for="mobile">Mobile</label> <input type="text" name="mobile" id="mobile" value="" required> <br>
        <label for="rank">Rank</label>
        <select id="rank" name="">
          <?php
          session_start();
          $_SESSION['rank'] = 0;
            for($i=$_SESSION['rank'];$i<=9;$i++)
            {
              echo "<option value='$i'>".$i."</option>";
            }
           ?>
        </select> <br>
        <button type="button" name="submitBtn" id="submitBtn" onclick="addAdmin()">SubmitA</button>
      </form>
    </div>

<div id="viewAdmin">
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" oninput="showAdmins()">
    <select name="searchBy" id="searchBy" onchange="showAdmins()">
      <option value="ID">ID</option>
      <option value="name">name</option>
      <option value="price">price</option>
      <option value="stock">stock</option>
      <option value="rating">rating</option>
    </select>

    <table width="100%" border="1" style="border-collapse:collapse;">
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
    </table>
</div>
  </body>
</html>
