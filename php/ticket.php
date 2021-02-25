<?php
function create_ticket($con){
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $ID = $_SESSION['ID'];
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
  $content = $_POST['content'];
  $ticked_id = $_POST['id'];
  $role = $_SESSION['role'];
  $ID = $_SESSION['ID'];
  if($role == "admin"){
    $is_admin = 1;
  }
  else{
    $is_admin = 0;
  }
  if(isset($content,$ticked_id))
  {
    if(empty($content) || empty($ticked_id))
    {
      //error
      die('Empty Variables');
    }
    else{
      $sql = "INSERT INTO tickets_response (author_id,is_admin,ticket_id,msg) VALUES ($ID,$is_admin,$ticked_id,'$content')";
      $result=mysqli_query($con,$sql);
      $sql2 = "UPDATE tickets SET status = 'open' WHERE ID = $ticked_id";
      $result2=mysqli_query($con,$sql2);
    }
  }
}

function viewTickets($con){
  $sql = "SELECT * FROM tickets";
  $url = "viewMessage.php";
  if ($_SESSION['role'] == "auditor") {
    $url = "viewAMessage.php";
  }
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
      echo "<td align='center'><a href='$url?id=$row[ID]'>View Ticket</a></td>";
      echo "</tr>";
    }
  }
}

function viewMyTickets($con){
  $ID = $_SESSION['ID'];
  $sql = "SELECT tickets.* FROM tickets INNER JOIN tickets_response ON tickets.id = tickets_response.ticket_id WHERE tickets_response.author_id = $ID";
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) == 0) {
     echo "No result found";
  }
  else{
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td> " . $row['ID'] . "</td>";
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
  $result = mysqli_query($con,$sql);
  $class = "customer ";
  while($row = mysqli_fetch_array($result)){
    if($row['status']=="pending") $class .= "unread ";
    else $class .= "read ";
    echo "<div class='$class'>";
    echo "Date: ".$row['created']."<br>";
    echo "Status: ".$row['status']."<br>";
    echo "Ticket ID: ".$row['ID']."<br>";
    echo "Customer ID: ".$row['customer_id']."<br>";
    echo "Title: ".$row['title']."<br>";
    echo "Message: ".$row['msg']."<br>";
    echo "</div>";
  }

  $sql1 = "SELECT * FROM tickets_response WHERE ticket_id = $id";
  $result1 = mysqli_query($con,$sql1);
  while($row = mysqli_fetch_array($result1)){
    if($row['is_admin']) {
      $class="admin ";
      $role = "Admin";
    }
    else {
      $class = "customer ";
      $role = "Customer";
    }
    if($row['is_read']) $class .= "read";
    else $class .= "unread";
    echo "<div class='$class'>";
    echo "Date: ".$row['created']."<br>";
    echo "Response ID: ".$row['ID']."<br>";
    echo $role." ID: ".$row['author_id']."<br>";
    //echo "Ticket ID".$row['ticket_id']."<br>";
    echo "Message: ".$row['msg']."<br>";
    echo "</div>";
  }
  $sql2 ="UPDATE tickets_response SET is_read = 1 WHERE ticket_id = $id AND is_read != 1 AND author_id != $_SESSION[ID]";
  $result2 = mysqli_query($con,$sql2);
}

function displayATicket($con){
  $id = $_GET['id'];
  $sql = "SELECT * FROM tickets WHERE ID = $id";
  $result = mysqli_query($con,$sql);
  $class = "customer ";
  while($row = mysqli_fetch_array($result)){
    if($row['status']=="pending") $class .= "unread ";
    else $class .= "read ";
    echo "<div class='$class'>";
    echo "Date: ".$row['created']."<br>";
    echo "Status: ".$row['status']."<br>";
    echo "Ticket ID: ".$row['ID']."<br>";
    echo "Customer ID: ".$row['customer_id']."<br>";
    echo "Title: ".$row['title']."<br>";
    echo "Message: ".$row['msg']."<br>";
    echo "</div>";
  }

  $sql1 = "SELECT * FROM tickets_response WHERE ticket_id = $id";
  $result1 = mysqli_query($con,$sql1);
  while($row = mysqli_fetch_array($result1)){
    if($row['is_admin']) {
      $class="admin ";
      $radio = "<input type='radio' name='select' id='$row[ID]' value='$row[ID]'><label>Select</label><br>";
      $role = "Admin";
    }
    else {
      $class = "customer ";
      $radio = "";
      $role = "Customer";
    }
    if($row['is_read']) $class .= "read";
    else $class .= "unread";
    echo "<div class='$class'>";
    echo $radio;
    echo "Date: ".$row['created']."<br>";
    echo "Response ID: ".$row['ID']."<br>";
    echo $role." ID: ".$row['author_id']."<br>";
    //echo "Ticket ID".$row['ticket_id']."<br>";
    echo "Message: ".$row['msg']."<br>";
    if($role == "Admin") {
      $sql3 = "SELECT * FROM report WHERE response_id = $row[ID]";
      $result3 = mysqli_query($con,$sql3);
      while($row3 = mysqli_fetch_array($result3)){
        echo "<div style = 'border-style: solid; border-color: blue;'>";
        echo "Auditor ID: $row3[auditor_id] <br>";
        echo "Comments: $row3[comment] <br>";
        if ($row3['is_report'] == 0) {
          echo "<button type='button' onclick='report($row3[ID])'>Report to HR</button>";
        }
        else {
          echo "Reported to HR";
        }
        echo "</div>";
      }
    }
    echo "</div>";
  }
  $sql2 ="UPDATE tickets_response SET is_read = 1 WHERE ticket_id = $id AND is_read != 1 AND author_id != $_SESSION[ID]";
  $result2 = mysqli_query($con,$sql2);
}

function ticket_comment($con){
  $comment = $_POST['comment'];
  $response_id = $_POST['id'];
  $auditor_id = $_SESSION['ID'];
  if(isset($comment,$response_id))
  {
    if(empty($comment)||empty($response_id))
    {
      //error
      die('Empty Variables');
    }
    else{
      $sql = "INSERT INTO report (auditor_id, response_id, comment) VALUES ($auditor_id, $response_id, '$comment')";
      $result=mysqli_query($con,$sql);
    }
  }
}

function report($con){
  $report_id = $_POST['id'];
  $sql = "UPDATE report SET is_report = 1 WHERE ID = $report_id";
  $result=mysqli_query($con,$sql);
}

function viewR($con){
  $sql2 = "SELECT * FROM tickets_response INNER JOIN report ON report.response_id = tickets_response.ID WHERE report.is_report = 1 AND report.archived = 0";
  $result2 = mysqli_query($con,$sql2);
  $ticket_id = [];
  while ($row2 = mysqli_fetch_array($result2)) {
    $ticket_id[$row2['ticket_id']] = true;
  }
  if (mysqli_num_rows($result2) == 0) {
     echo "No reports found";
  }
  else{
    $sql = "SELECT * FROM tickets WHERE ID = ";
    foreach ($ticket_id as $key => $value) {
      if($value)
        $sql .= $key . " OR ";
    }
    $sql = substr($sql,0,-4);
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['customer_id'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['status'] . "</td>";
      echo "<td>" . $row['created'] . "</td>";
      echo "<td align='center'><a href='viewReport.php?id=$row[ID]'>View Ticket</a></td>";
      echo "</tr>";
    }
  }
}

function displayRTicket($con){
  $id = $_GET['id'];
  $sql = "SELECT * FROM tickets WHERE ID = $id";
  $result = mysqli_query($con,$sql);
  $class = "customer ";
  while($row = mysqli_fetch_array($result)){
    if($row['status']=="pending") $class .= "unread ";
    else $class .= "read ";
    echo "<div class='$class'>";
    echo "Date: ".$row['created']."<br>";
    echo "Status: ".$row['status']."<br>";
    echo "Ticket ID: ".$row['ID']."<br>";
    echo "Customer ID: ".$row['customer_id']."<br>";
    echo "Title: ".$row['title']."<br>";
    echo "Message: ".$row['msg']."<br>";
    echo "</div>";
  }
  $sql1 = "SELECT * FROM tickets_response WHERE ticket_id = $id";
  // $sql1 = "SELECT * FROM tickets_response INNER JOIN report ON tickets_response.ID = report.response_id WHERE report.is_report = 1 AND  tickets_response.ticket_id = $id ";
  $result1 = mysqli_query($con,$sql1);
  while($row = mysqli_fetch_array($result1)){
    if($row['is_admin']) {
      $class="admin ";
      $role = "Admin";
    }
    else {
      $class = "customer ";
      $role = "Customer";
    }
    if($row['is_read']) $class .= "read";
    else $class .= "unread";
    echo "<div class='$class'>";
    echo "Date: ".$row['created']."<br>";
    echo "Response ID: ".$row['ID']."<br>";
    echo $role." ID: ".$row['author_id']."<br>";
    //echo "Ticket ID".$row['ticket_id']."<br>";
    echo "Message: ".$row['msg']."<br>";
    if($role == "Admin") {
      $sql3 = "SELECT * FROM report WHERE response_id = $row[ID] AND is_report = 1 AND archived = 0";
      $result3 = mysqli_query($con,$sql3);
      while($row3 = mysqli_fetch_array($result3)){
        echo "<div style = 'border-style: solid; border-color: blue;'>";
        echo "<input type='radio' name='select' id='$row3[ID]' value='$row3[ID]'><label>Select</label><br>";
        echo "Auditor ID: $row3[auditor_id] <br>";
        echo "Comments: $row3[comment] <br>";
        echo "</div>";
      }
    }
    echo "</div>";
  }
}

  function addPenalty($con){
    $comment = $_POST['comment'];
    $report_id = $_POST['id'];
    $hr_id = $_SESSION['ID'];
    if(isset($comment,$report_id))
    {
      if(empty($comment)||empty($report_id))
      {
        //error
        die('Empty Variables');
      }
      else{
        $sql = "INSERT INTO penalty (report_id, hr_id, comments) VALUES ($report_id, $hr_id, '$comment')";
        $result=mysqli_query($con,$sql);
        $sql1 = "UPDATE report SET archived = 1 WHERE ID = $report_id";
        $result1=mysqli_query($con,$sql1);
      }
    }
  }

  function viewP($con){
    $sql2 = "SELECT ticket_id from penalty INNER JOIN report ON penalty.report_id = report.ID INNER JOIN tickets_response ON report.response_id = tickets_response.ID";
    $result2 = mysqli_query($con,$sql2);
    $ticket_id = [];
    while ($row2 = mysqli_fetch_array($result2)) {
      $ticket_id[$row2['ticket_id']] = true;
    }
    if (mysqli_num_rows($result2) == 0) {
       echo "No reports found";
    }
    else{
      $sql = "SELECT * FROM tickets WHERE ID = ";
      foreach ($ticket_id as $key => $value) {
        if($value)
          $sql .= $key . " OR ";
      }
      $sql = substr($sql,0,-4);
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['created'] . "</td>";
        echo "<td align='center'><a href='viewPenalty.php?id=$row[ID]'>View Ticket</a></td>";
        echo "</tr>";
      }
    }
  }

  function displayPTicket($con){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tickets WHERE ID = $id";
    $result = mysqli_query($con,$sql);
    $class = "customer ";
    while($row = mysqli_fetch_array($result)){
      if($row['status']=="pending") $class .= "unread ";
      else $class .= "read ";
      echo "<div class='$class'>";
      echo "Date: ".$row['created']."<br>";
      echo "Status: ".$row['status']."<br>";
      echo "Ticket ID: ".$row['ID']."<br>";
      echo "Customer ID: ".$row['customer_id']."<br>";
      echo "Title: ".$row['title']."<br>";
      echo "Message: ".$row['msg']."<br>";
      echo "</div>";
    }
    $sql1 = "SELECT * FROM tickets_response WHERE ticket_id = $id";
    // $sql1 = "SELECT * FROM tickets_response INNER JOIN report ON tickets_response.ID = report.response_id WHERE report.is_report = 1 AND  tickets_response.ticket_id = $id ";
    $result1 = mysqli_query($con,$sql1);
    while($row = mysqli_fetch_array($result1)){
      if($row['is_admin']) {
        $class="admin ";
        $role = "Admin";
      }
      else {
        $class = "customer ";
        $role = "Customer";
      }
      if($row['is_read']) $class .= "read";
      else $class .= "unread";
      echo "<div class='$class'>";
      echo "Date: ".$row['created']."<br>";
      echo "Response ID: ".$row['ID']."<br>";
      echo $role." ID: ".$row['author_id']."<br>";
      //echo "Ticket ID".$row['ticket_id']."<br>";
      echo "Message: ".$row['msg']."<br>";
      if($role == "Admin") {
        $sql3 = "SELECT * FROM penalty INNER JOIN report ON penalty.report_id = report.ID  WHERE response_id = $row[ID] AND is_report = 1";
        $result3 = mysqli_query($con,$sql3);
        while($row3 = mysqli_fetch_array($result3)){
          echo "<div style = 'border-style: solid; border-color: blue; margin:2px;'>";
          echo "Auditor ID: $row3[auditor_id] <br>";
          echo "Comments: $row3[comment] <br>";
          echo "<div style = 'border-style: solid; border-color: purple; margin:2px;'>";
          echo "HR ID: $row3[hr_id] <br>";
          echo "Comments: $row3[comments] <br>";
          echo "</div>";
          echo "</div>";
        }
      }
      echo "</div>";
    }
  }

  session_start();
  if (isset($_GET['q'])) {
    $q = $_GET['q'];
  }
  elseif (isset($_POST['q'])) {
    $q = $_POST['q'];
  }
  else{
    die("Please refresh and try again.");
  }
 include 'dbhandler.php';
switch ($q) {
  case 'view':
    viewTickets($con);
    break;
  case 'viewm':
    viewMyTickets($con);
    break;
  case 'display':
    displayTicket($con);
    break;
  case 'displayA':
    displayATicket($con);
    break;
  case 'contact':
    create_ticket($con);
    break;
  case 'response':
    ticket_response($con);
    break;
  case 'comment':
    ticket_comment($con);
    break;
  case 'report':
    report($con);
    break;
  case 'viewR':
    viewR($con);
    break;
  case 'displayR':
    displayRTicket($con);
    break;
  case 'penalty':
    addPenalty($con);
    break;
  case 'viewP':
    viewP($con);
    break;
  case 'displayP':
    displayPTicket($con);
    break;
}
mysqli_close($con);
?>
