<?php
function create_ticket($con){
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  //$ID = $_SESSION['id'];
  $ID = 2;
  if(isset($subject, $content))
  {
    if(empty($subject)||empty($content))
    {
      //error
      die('Empty Variables');
    }
    else{
      $sql = "INSERT INTO tickets (customer_id,title,msg) VALUES ($ID,'$subject','$content')";
      $result=mysqli_query($con,$sql);
    }
  }
}

function ticket_response($con){
  $content = $_GET['content'];
  $ticked_id = $_GET['id'];
  //$role= $_SESSION['role']="admin";
  $role = "admin";
  if($role="admin") $is_admin = 1;
  $is_admin = 0;
  //$ID = $_SESSION['id'];
  $ID = 1;
  if(isset($content,$ticked_id))
  {
    if(empty($content)||empty($ticked_id))
    {
      //error
      die('Empty Variables');
    }
    else{
      $sql = "INSERT INTO tickets_response (author_id,is_admin,ticket_id,msg) VALUES ($ID,$is_admin,$ticked_id,'$content')";
      $result=mysqli_query($con,$sql);
    }
  }
}

function viewTickets($con){
  $sql = "SELECT * FROM tickets";
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['customer_id'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>" . $row['created'] . "</td>";
      echo "<td align='center'><a href='viewMessage.php?id=$row[ID]'>View Ticket</a></td>";
      echo "</tr>";
    }
  }
}

function viewMyTickets($con){
  // $ID = $_SESSION['id'];
  $ID = 1;
  $sql = "SELECT tickets.* FROM tickets INNER JOIN tickets_response ON tickets.id = tickets_response.ticket_id WHERE tickets_response.admin_id = $ID";
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['customer_id'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>" . $row['created'] . "</td>";
      echo "<td align='center'><a href='viewMessage.php?id=$row[ID]'>View Ticket</a></td>";
      echo "</tr>";
    }
  }
}

function displayTicket($con){
  $id = $_GET['id'];
  $sql = "SELECT * FROM tickets WHERE ID = $id";
  $sql1 = "SELECT * FROM tickets_response where ticket_id = $id";
  $result = mysqli_query($con,$sql);
  $class = "customer ";
  while($row = mysqli_fetch_array($result)){
    if($row['status']=="pending") $class .= "unread";
    else $class .= "read";
    echo "<div class='$class'>";
    echo $row['created']."<br>";
    echo $row['status']."<br>";
    echo $row['ID']."<br>";
    echo $row['customer_id']."<br>";
    echo $row['title']."<br>";
    echo $row['msg']."<br>";
    echo "</div>";
  }
  $result1 = mysqli_query($con,$sql1);
  while($row = mysqli_fetch_array($result1)){
    if($row['is_admin']) $class="admin ";
    else $class = "customer ";
    if($row['is_read']) $class .= "read";
    else $class .= "unread";
    echo "<div class='$class'>";
    echo $row['created']."<br>";
    echo $row['ID']."<br>";
    echo $row['author_id']."<br>";
    echo $row['ticket_id']."<br>";
    echo $row['msg']."<br>";
    echo "</div>";
  }
}

$con = mysqli_connect('localhost','root','','marketplace');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
switch ($_GET['q']) {
  case 'view':
    viewTickets($con);
    break;
  case 'viewm':
    viewMyTickets($con);
    break;
  case 'display':
    displayTicket($con);
    break;
  case 'contact':
    create_ticket($con);
    break;
  case 'response':
    ticket_response($con);
    break;
}
mysqli_close($con);
?>
