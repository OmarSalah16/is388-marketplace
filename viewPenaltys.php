<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Tickets</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewPenalty()">
    <button type="button" onclick="viewReports()">Refresh</button>
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
  </body>
</html>
