<div style="color:red; font-size: 14px">
<?php
include 'php/customError.php';
session_start();
include "php/dbhandler.php";
if (isset($_SESSION['fID'])) {
  $ID = $_SESSION['fID'];
  $fIDflag = true;
  $pFlag = true;
}
elseif (isset($_SESSION['ID'])) {
  $ID = $_SESSION['ID'];
  $fIDflag = false;
  $pFlag = false;
}
else{
  header("Location: login.php");
}
if (isset($_POST['submit'])) {
  $sql2 = "UPDATE users SET password = '$_POST[newP]' WHERE ID = $ID";
  if (!$fIDflag) {
    $sql = "SELECT ID FROM users WHERE ID = $ID AND password = '$_POST[oldP]'";
    $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
    echo "Incorrect password";
    $pFlag = true;
  }
  }
   if ($pFlag) 
    {
        $err = [];
        $password = $_POST['newP'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

          if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
              array_push($err,'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
          }
          if($_POST['newP']!=$_POST['newPC']){
            array_push($err,"Passwords do no match.");
          }
          $i=0;
          for($i;$i<count($err);$i++){
            echo $err[$i]."<br>";
          }
          if($i == 0){
            $result2 = mysqli_query($con,$sql2);
            header("Location: clientProfile");
          }
  }
}
?>
</div>
<form method="post">
  <h1>Password Update</h1>
  <br>
  <?php
   if (isset($_SESSION['ID'])) {
     echo " <label for='name'>Old password</label> <input type='password' name='oldP' required style='margin-left:71px;'> <br><br>";
   }
  ?>
  <label for="price">New password</label> <input type="password" name="newP"  required style="margin-left:63px;"> <br><br>
  <label for="stock">Confirm new password</label> <input type="password" name="newPC"  required>
  <input type="submit" name="submit" value="Submit">
</form>
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

input[type="submit"]{
  border:0;
  background: none;
  display: block;
  margin: 35px;
  margin-left: 100px;
  text-align: center;
  border: 1px solid orange;
  padding: 7px 17px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

input[type="submit"]:hover{
  background: orange;
}
input{
  color: black;
}
.addProfile{
  margin-top: 10px;
}
</style>
