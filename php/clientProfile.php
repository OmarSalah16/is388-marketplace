<?php
session_start();
function viewP($con){

  $ID = $_SESSION['client_id'];
  $sql = "SELECT * FROM users WHERE ID = $ID";
  $sql2 = "SELECT * FROM orders";
 
  $result = mysqli_query($con,$sql);
  $result2 = mysqli_query($con,$sql2);
  
 
  
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['mobile'] . "</td>";
    }
    echo "<h1>My Orders</h1>";
    

    while($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row2['ID'] . "</td>";
    echo "<td>" . $row2['status'] . "</td>";
    echo "<td>" . $row2['date'] . "</td>";
    if( !$row2['review_status'])
    {
      echo "<td align='center'><button type='button' onclick='writeReview(".$row2['ID'].")'>Review</button></td>";
    }
    else
    {
      echo "<td align = 'center'>Reviewed</td>";
    }
    }
  }




function deleteP($con){
  $id = intval($_GET['ID']);
  $sql = "DELETE FROM users WHERE ID = 3 ";
  $result = mysqli_query($con,$sql);
}

// function reviewP($con){
//   $id = intval($_GET['ID']);
//   $rating = ($_GET['rating']);
//   $review = ($_GET['review']);
  
  

// }

function editP($con){
  $sql ="UPDATE users SET name='$_GET[name]',mobile='$_GET[mobile]',username='$_GET[username]' WHERE ID= 1";
  $result = mysqli_query($con,$sql);
  //echo $sql;
}
$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {
  
  case 'del':
    deleteP($con);
    break;

  case 'view':
    viewP($con);
    break;

  case 'edit':
    editP($con);
    break;

  case 'review':
    reviewP($con);
    break;  
}
mysqli_close($con);
?>
