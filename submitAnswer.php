<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
  //  include 'customerMenu.php';
    include 'php/dbhandler.php';
      if (isset($_POST['submit'])) {
        $answers = "";
        $flag = true;
        foreach ($_POST['answer'] as $value) {
          if($value == "")
          {
            $flag = false;
          }
          else {
            $answers .= $value . ",";
          }
        }
        $answers = substr($answers,0,-1);
        if ($flag) {
          $sql2 = "UPDATE survey_answers SET is_open = 0, answers = '$answers' WHERE ID = $_GET[ID]";
          $result2 = mysqli_query($con,$sql2);
          $sql3 = "UPDATE survey SET replies = replies + 1 WHERE ID = $_GET[sID]";
          $result3 = mysqli_query($con,$sql3);
          if($result2)
          {
            header("Location: clientSurvey");
          }
          else {
            echo "<h3 style='color: red;'>Error submitting answer.</h3>";
          }
        }
      }
     ?>

    <form method="post">
      <?php
        if(isset($_GET['ID'],$_GET['sID']))
        {
          $sql = "SELECT *, survey.ID AS sID FROM survey INNER JOIN survey_answers ON survey.ID = survey_answers.survey_id WHERE survey_answers.ID = $_GET[ID]";
          $result = mysqli_query($con,$sql);
          if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_array($result);
            if ($row['is_open']==0) {
              die("<h1>Already Submitted</h1>");
            }
            $questions = explode(',',$row['questions']);
            //echo "<input type='text' name='ID' value='$_GET[ID]' style='display:none;'>";
            //echo "<input type='text' name='sID' value='$row[sID]' style='display:none;'>";
            foreach ($questions as $value) {
              echo $value;
              echo "<br>";
              echo "<input type='text' name='answer[]' value='' placeholder='Answer here...' required> <br>";
            }
            echo "</td>";
            echo "</tr>";
          }
          else {
            echo "string";
            header("Location: clientSurvey");
          }
        }
        else {
          echo "string";
          header("Location: clientSurvey");
        }
      ?>
      <input type="submit" name="submit" value="Submit Answers">
    </form>
  </body>
</html>
