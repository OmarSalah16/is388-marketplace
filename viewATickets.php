<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>View Tickets</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewTickets(false)">

    <table width="100%" border="4" class="table table-hover">
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
    <button type="button" onclick="viewTickets(false)">Refresh</button>
  </body>
</html>

<style media="screen">
*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

body{
  background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.3)), url(pics/ticket.jpg);
  background-size: cover;
  background-position:center;
  background-repeat: no-repeat;
}

table{
  background-color: lightgrey;
  margin-top: 20%;
}

button{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor:pointer;
}

button:hover{
  background: #2ecc71;
}

</style>
