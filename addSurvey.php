<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Survey</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/surveyCreator.js"></script>
    <style media="screen">
      .question{
        border: solid;
        border-width: 1px;
        margin: 16px 4px;
      }
      .question *{
        margin: 3px;
        padding: 4px;
      }
    </style>
  </head>
  <body>
    <h2>Survey Creator</h2>
    Add <input type="number" value="1" min="1" max='10' id='n'>
    question(s)<button type="button" id='add'>Go</button> <br><br>
    <form id="survey">
      <label for="name">Survey Name:</label>
        <input type="text" name="name" value="" required><br><br>
      <div id="question" class="question test">
        <h6>Question 1</h6>
        <input type="text" name="q[]" value="" required>
      </div>
      <input class="submit" type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
