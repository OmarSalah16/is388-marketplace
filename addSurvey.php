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
    <input type="number" value="1" min="1" max='10' id='n'>
    <button type="button" id='add'>Add Questions</button>
    <form id="survey">
      <div id="question" class="question test">
        <h6>Question 1</h6>
        <input type="text" name="q1" value="">
        <select name="type" id="type">
          <option value="text">Text</option>
          <option value="radio">Radio</option>
          <option value="check">Check</option>
          <option value="select">Select</option>
        </select>
      </div>
      <input class="submit" type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
