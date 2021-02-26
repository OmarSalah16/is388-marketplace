<?php
session_start();
include "cartInit.php";
include "navbar.php";
include 'php/customError.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <br>
<h1>Product Review</h1>
<form class="box" action="" method="post">
      <input type="textarea" name="review" placeholder="Write your review.."><br><br>
      <label for="">Rating</label> <input type="number" name="rating" step="1" min="1" max="5" value="1"><br><br>
      <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    include 'php/dbhandler.php';
      if (isset($_POST['submit'])){
        $ID = $_GET['ID'];
        $err = [];
        $review = $_POST['review'];
        $rating = $_POST['rating'];

        if($rating<1 || $rating>5){
          array_push($err,"invalid rating");
        }
        if($review == ""){
          array_push($err,"Please fill in the review");
        }
        $i=0;
        for($i;$i<count($err);$i++){
          echo $err[$i]."<br>";
        }
        if($i!=0){
          exit(0);
        }
        $sql = "UPDATE reviews SET rating = $rating, review = '$review', is_reviewed = 1 WHERE ID = $ID";
        $result = mysqli_query($con,$sql);

        $sql2 = "SELECT product_id FROM reviews WHERE ID = $ID";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $PID = $row2['product_id'];

        $sql3 = "SELECT rating, is_reviewed FROM reviews WHERE product_id = $PID";
        $result3 = mysqli_query($con,$sql3);
        $count = 0;
        $sum = 0;
        while($row3 = mysqli_fetch_array($result3)){
          if ($row3['is_reviewed'] == 1) {
            $sum += $row3['rating'];
            $count++;
          }
        }
        $Trating = round($sum / $count, 1);
        $sql4 = "UPDATE products SET rating = $Trating WHERE ID = $row2[product_id]";
        $result4 = mysqli_query($con,$sql4);
        if($result){
          header("Location: clientProfile");
        }
        else {
          echo "failure";
        }
      }
      mysqli_close($con);
    ?>
</body>
</html>

<style media="screen">
*{
  text-align: center;
  font-family: Century Gothic;
}
    body{
      background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg3.jpg);
      height:100vh;
      background-size: cover;
      background-position:center;
      background-repeat: no-repeat;
    }

    input[type=textarea]{
      border:0;
      background: white;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 14px 10px;
      width: 400px;
      outline: none;
      border-radius: 24px;
      transition: 0.25s;
    }

    input[type=number]{
      border:0;
      background: white;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 10px;
      outline: none;
      border-radius: 24px;
      transition: 0.25s;
    }

    label{
      font-size: 20px;
    }

    input[type="submit"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 14px 40px;
      outline: none;
      border-radius: 24px;
      transition: 0.25s;
      cursor:pointer;
    }

    input[type="submit"]:hover{
      background: #3498db;
    }
</style>
