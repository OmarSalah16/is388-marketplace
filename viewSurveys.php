<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Surveys</title>
    <script src="js/survey.js"></script>
  </head>
  <body onload="viewSurveys()">
    <button type="button">Refresh</button>
    <a href="viewSurvey.php?q=a">View Archives</a>
    <a href="addSurvey.php">Add Survey</a>
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
