<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include "hrBar.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>View Tickets</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewPenaltys()">
    <h1><u>Penalties</u></h1><br>
    <table width="100%" border="1" style="border-collapse:collapse;" class="table table-hover">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Customer ID</strong></th>
          <th><strong>Title</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Created</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
    <button type="button" onclick="viewPenaltys()">Refresh</button>
  </body>
</html>

<style media="screen">
  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg5.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }

  h1{
    margin-left: 45%;
    color:white;
  }
  button{
    margin-left: 720px;
    border:0;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid black;
    padding: 14px 40px;
    outline: none;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
  }

  button:hover{
    background: #2ecc71;
  }
</style>
