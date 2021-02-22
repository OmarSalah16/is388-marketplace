<?php
function viewSurveys($con){
  $sql = "SELECT * FROM survey";
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td><a href='viewSurvey?ID=$row[ID]'>".$row['name']."</a></td>";
      echo "<td>" . $row['auditor_id'] . "</td>";
      echo "<td>" . $row['replies'] . "</td>";
      echo "<td><a href='sendSurvey?ID=$row[ID]'>Send Survey</a></td>";
      echo "<td align='center'><button type='button' onclick='deleteSurvey($row[ID])'>Delete</button></td>";
      echo "</tr>";
    }
  }
}

function deleteSurvey($con)
{
  $sql = "DELETE FROM survey WHERE ID = $_POST[ID]";
  $result = mysqli_query($con,$sql);
}

function sendSurvey($con){
  $sql = "";
  $result = mysqli_query($con,$sql);
}

  include 'dbhandler.php';
  switch ($_POST['q']) {
    case 'view':
      viewSurveys($con);
      break;
    case 'delete':
      deleteSurvey($con);
      break;
    case 'send':
      sendSurvey($con);
      break;
  }
  mysqli_close($con);
?>
