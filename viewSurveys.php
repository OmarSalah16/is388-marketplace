<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Surveys</title>
    <script src="js/ticket.js"></script>
  </head>
  <body onload="viewSurveys()">
    <button type="button" onclick="viewReports()">Refresh</button>
    <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th><strong>ID</strong></th>
          <th><strong>Survey Name</strong></th>
          <th><strong>Creator ID</strong></th>
          <th><strong>Replies</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
  </body>
</html>
