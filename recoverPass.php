<?php
session_start();
include 'php/customError.php';
include 'php/dbhandler.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Recovery</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $eFlag = true;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<h4 style ='color:red;font-weight:bold;text-align:center;'>Invalid Email</h4>";
  $eFlag = false;
  }
  $sql = "SELECT * FROM users WHERE email = '$email'";
  if ($eFlag) {
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) != 0) {
    echo "<h5>Please answer this security question:</h5> <br>";
    echo $row['security_question'] . "<br> <br>";
    echo "<form action='recoverPass.php' method='post'>
    <input type='text' name='answer' placeholder='Security Answer'>
    <input type='text' style='display:none;' name='email' value='$email'>
    <input type='submit' name='submit2'>
    </form>";
  }
  else{
    echo "<h4 style ='color:red;font-weight:bold;text-align:center;'>Invalid Email</h4>";
    echo "<form action='recoverPass.php' method='post'>
    <input type='text' name='email' placeholder='Email Address'>
    <input type='submit' name='submit'>
    </form>";
  }

}
else{
  echo "<h4 style ='color:red;font-weight:bold;text-align:center;'>Invalid Email</h4>";
  echo "<form action='recoverPass.php' method='post'>
  <input type='text' name='email' placeholder='Email Address'>
  <input type='submit' name='submit'>
  </form>";
}
}
elseif (isset($_POST['submit2'])) {
  $sql2 = "SELECT ID ,security_answer FROM users WHERE email = '$_POST[email]'";
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_array($result2);
  if ($_POST['answer'] == $row2['security_answer']) {
    $_SESSION['fID'] = $row2['ID'];
    header("Location: changePassword.php");
  }
  else{
    echo "<h4 style='color:red; font-weight:bold;text-align:center;'>Incorrect answer</h4>";
    echo "<form action='recoverPass.php' method='post'>
    <input type='text' name='email' placeholder='Email Address'>
    <input type='submit' name='submit'>
    </form>";
  }
}
else{
echo "<form action='recoverPass.php' method='post'>
  <input type='text' name='email' placeholder='Email Address'><br>
  <input type='submit' name='submit'>
</form>";
}


mysqli_close($con);
?>
</body>
</html>

<style media="screen">

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/background3.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

form{
transform: translate(490%, 150%);
position: absolute;
}

input[type="submit"]{
  border:0;
  background: none;
  display: block;
  text-align: center;
  margin-left: 30px;
  margin-top: 5px;
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
.addProfile{
  margin-top: 10px;
}
</style>
