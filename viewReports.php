<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Tickets</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewReports()">
    <h1>Reports</h1>

    <table width="100%" border="1" style="border-collapse:collapse;">
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
    <button type="button" onclick="viewReports()">Refresh</button>
  </body>
</html>

<style media="screen">

  *{
    font-family: Century Gothic;
  }

  h1{
    text-align: center;
  }

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(pics/bg7.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }

  button{
    border:0;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    border-radius: 24px;
    transition: 0.25s;
    cursor:pointer;
  }

  button:hover{
    background: #2ecc71;
  }

  td{
    text-align: center;
  }
</style>
