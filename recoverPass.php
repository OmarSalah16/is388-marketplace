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
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  echo "<h5>Please answer this security question:</h5> <br>";
  echo $row['security_question'] . "<br> <br>";
  echo "<form action='recoverPass.php' method='post'>
  <input type='text' name='answer'>
  <input type='text' style='display:none;' name='email' value='$email'>
  <input type='submit' name='submit2'>
 </form>";
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
    echo "<h4 style='color:red; font-weight:bold;'>Incorrect answer</h4>";
    echo "<form action='recoverPass.php' method='post'>
  <input type='text' name='email'>
  <input type='submit' name='submit'>
</form>";
  }
}
else{
 echo "<form action='recoverPass.php' method='post'>
  <input type='text' name='email'>
  <input type='submit' name='submit'>
</form>";
}


mysqli_close($con);
?>
</body>
</html>



