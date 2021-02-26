<?php
include 'customError.php';
session_start();
include 'dbhandler.php';
if(isset($_POST['q'])){
  $questions = "";
  foreach ($_POST['q'] as $value) {
    if($value != "")
      $questions.=$value.",";
  }
  $questions = substr($questions,0,-1);
  echo $questions;
  $sql = "INSERT INTO survey (name,auditor_id,questions) VALUES ('$_POST[name]',$_SESSION[ID],'$questions')";
  $result = mysqli_query($con,$sql);
}
mysqli_close($con);
?>
