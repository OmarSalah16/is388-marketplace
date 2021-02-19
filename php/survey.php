<?php
function viewSurveys($con){
  $select = $_GET['select'];
  if(is_numeric($select))
    {
      $select = intval($select);
    }
  $bar = $_GET['bar'];
  $sql = "SELECT * FROM products";
  $sql2="SELECT * FROM products WHERE $select = '".$bar."'";
  if($bar == ""){
    $result = mysqli_query($con,$sql);
  }
  else {
    $result = mysqli_query($con,$sql2);
  }
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['auditor_id'] . "</td>";
    echo "<td>" . $row['replies'] . "</td>";
    echo "<td align='center'><button type='button' name='Delete' onclick='deleteSurvey(".$row['ID'].")'>Delete</button></td>";
    echo "</tr>";
    }
  }
}

  include 'dbhandler.php';
  switch ($_GET['q']) {
    case 'view':
      viewSurveys($con);
      break;
  }
  mysqli_close($con);
?>
