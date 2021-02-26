<style media="screen">
  h4 .error{
    color: red;
    font-weight: bold;
  }
</style>
<?php
  function customError($errnum,$errmsg,$errfile,$errline){
    $message = "Error number: ".$errnum.". | Error message: " . ". | File name: ". $errfile . ", Error line: ". $errline . ". \n";
    error_log($message, 3, "error_log.txt");
    die("<h4 class='error'>A fatal error has occured. Please contact an adminstrator. \n" . $errnum . " | " . $errmsg . ". </h4>");
  }
  set_error_handler("customError");
?>
