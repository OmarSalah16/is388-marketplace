<?php
  session_start();
include 'customError.php';
  $file_result = "";

  $file_size =$_FILES['file']['size'];
  if($file_size > 8388608){
    echo "<a href='../clientProfile'>Go Back</a><br>";
    die("Error Code: ");
        }

 if ($_FILES["file"]["error"] > 0)
 {
   echo "<a href='../clientProfile'>Go Back</a><br>";
   echo "Oh no! :( A error ocurred trying to upload the file! Please try again";
   die("Error Code: " . $_FILES["file"]["error"]);
  }
    else {
    $newfilename = $_SESSION['ID'] .'.' . 'jpg';
    move_uploaded_file($_FILES["file"]["tmp_name"], "..\user_images\\" . $newfilename);
    }
    include 'dbhandler.php';
    $sql = "INSERT INTO user_image (user_id,image_name) VALUES ($_SESSION[ID],'$newfilename')";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
    sleep(3);
    header("Location: ../clientProfile");
?>
