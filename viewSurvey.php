<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Author ID</th>
          <th>Questions</th>
          <th>Replies</th>
        </tr>
      </thead>
      <?php
        include 'php/dbhandler.php';
        if(isset($_GET['ID']))
        {
          $sql = "SELECT * FROM survey WHERE ID = $_GET[ID]";
          $result = mysqli_query($con,$sql);
          if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_array($result);
            $questions = explode(',',$row['questions']);
            echo "<tr>";
            echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['auditor_id']."</td>";
            echo "<td>";
            foreach ($questions as $value) {
              echo $value;
              echo "<br>";
            }
            echo "</td>";
            echo "<td>".$row['replies']."<td";
            echo "</tr>";
          }
      ?>
   </table>
   <h2>Replies: </h2>
   <?php
     $sql2 = "SELECT * FROM survey_answers WHERE survey_id = $_GET[ID]";
     $result2 = mysqli_query($con,$sql2);
     if (mysqli_num_rows($result2)>0) {
       while($row2 = mysqli_fetch_array($result2))
       {
         echo "<div class='reply'>";
         echo "User: $row2[customer_id] <br>";
         if ($row2['is_open']==0) {
           $answers = explode(',',$row2['answers']);
           for ($i=0; $i < count($questions); $i++) {
             echo "$questions[$i] <br> $answers[$i] <br><br>";
           }
         }
         else {
           echo "Reply not submitted";
         }
         echo "</div>";
       }
     }
     else {
       echo "No Replies";
     }
   }
 else {
   header("Location: viewSurveys");
 }
    mysqli_close($con);
   ?>
  </body>
</html>

<style media="screen">
*{
  font-family: Century Gothic;
}
body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg8.jpg);
  height:100vh;
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

td{
  text-align: center;
}
</style>
