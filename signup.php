<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src=js/signupfilter.js></script>
    <style media="screen">
      body{
        margin:0;
        padding:0;
        font-family: Century Gothic;
        background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(pics/register.jpg);
        background-size: cover;
        background-position:center;
        background-repeat: no-repeat;
        height:100vh;
      }
      .box{
        width:300px;
        padding: 40px;
        position: absolute;
        left:20%;
        bottom: 50%;
        transform: translate(-50%, 50%);
        background: #191919;
        text-align: center;
        border-radius: 24px;
      }
      .box h1{
        color:white;
        text-transform: uppercase;
        font-weight: 500;
      }
      .box input[type="text"], .box input[type="password"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
      }
      .box input[type="text"]:focus, .box input[type="password"]:focus{
        width: 280px;
        border-color: #2ecc71;
      }
      .box input[type="submit"]{
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor:pointer;
      }
      .box input[type="submit"]:hover{
        background: #2ecc71;
      }
      .error{
        color: red;
        font-weight: bold;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <form class="box" action="signup.php" method="post" oninput="checkForm()">
      <h1>Sign Up Now</h1>
      <div id="error" class='error'>
      <?php
      include 'php/customError.php';
        include 'php/dbhandler.php';
        if (isset($_POST['submit'])){
          $err = [];
          foreach ($_POST as $value) {
            if ($value == "") {
              array_push($err,"Please fill all fields.");
              break;
            }
          }
          $mobile = $_POST['mobile'];
          $reg = "0125";
          $mvalid = true;
          if(strlen($mobile) != 11)
            $mvalid = false;
          if($mvalid){
            if ($mobile[0] != '0' && $mobile[1] != '1')
              $mvalid = false;
            if(strpos($reg,$mobile[2]) === false)
              $mvalid = false;
          }
          if(!$mvalid){
            array_push($err,"Invalid Mobile Number.");
          }
          $password = $_POST['password'];
          $uppercase = preg_match('@[A-Z]@', $password);
          $lowercase = preg_match('@[a-z]@', $password);
          $number = preg_match('@[0-9]@', $password);
          $specialChars = preg_match('@[^\w]@', $password);

          if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
              array_push($err,'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
          }

          if($_POST['password']!=$_POST['Cpassword']){
            array_push($err,"Passwords do no match.");
          }
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($err,"Invalid email.");
          }
          $checksql = "SELECT email FROM users WHERE email = '$_POST[email]'";
          $checkres = mysqli_query($con,$checksql);
          if (mysqli_num_rows($checkres)!=0){
            array_push($err,"email already in use");
          }
          $i=0;
          for($i;$i<count($err);$i++){
            echo $err[$i]."<br>";
          }
          if($i==0){
            $sql = "INSERT INTO users (email,password,name,mobile,role,security_question,security_answer) VALUES ('$_POST[email]','$_POST[password]','$_POST[name]','$_POST[mobile]','customer','$_POST[question]','$_POST[answer]')";
            $result = mysqli_query($con,$sql);
            if($result){
              header("Location: login.php");
            }
            else {
              echo '<script language="javascript">';
              echo 'alert("Please contact customer support.")';
              echo '</script>';
            }
          }
        }
      ?>
      </div>
      <input class="data" type="text" name="email" value="" placeholder="Email" >
      <input id="password" class="data" type="password" name="password" value="" placeholder="Password" required>
      <input class="data" type="password" name="Cpassword" value="" placeholder="Confirm Password" required>
      <input class="data" type="text" name="name" value="" placeholder="Name" required>
      <input class="data" type="text" name="mobile" value="" placeholder="Mobile Number" required>
      <select class="form" name="question">
      <option value="What is your fathers name?">What is your fathers name?</option>
      <option value="What is the name of your pet?">What is the name of your pet?</option>
      <option value="What is your mothers name?">What is your mothers name?</option>
      <option value="What was your childhood nickname?">What was your childhood nickname?</option>
      </select>
      <input type="text" name="answer" value="" class="form" placeholder="Security Answer" required>
      <input id="submit" type="submit" value="Submit" name="submit" value="Register" required>
    </form>
     </body>
</html>
