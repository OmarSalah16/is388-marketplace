var qCounter = 1;
$(document).ready(function(){
  //function 1 submit override
  $('#survey').submit(function(e) {
  var postData = $("#survey :input").serializeArray();
  console.log(postData);
  /* start ajax submission process */
  $.ajax({
      url: "php/surveyCreator.php",
      type: "POST",
      data: postData,
      success: function(data, textStatus, jqXHR) {
        window.location.href = "viewSurveys";
      },
      error: function(jqXHR, textStatus, errorThrown) {
          alert('Error occurred!');
      }
  });
  e.preventDefault(); //STOP default action
  /* ends ajax submission process */
  });

  //function 2 add question
  $("#add").click(function(e){
    for (var i = 0; i < $("#n").val(); i++) {
      $(".submit").before("<div id='question' class='question'><h6>Question " + ++qCounter + "</h6><input type='text' name='q[]' value=''></div>");
    }
  });

});
