$(document).ready(function(){
  //function 1
  $('#survey').submit(function(e) {
  var postData = $(".question :input").serializeArray();
  console.log(postData);
  /* start ajax submission process */
  $.ajax({
      url: "php/surveyCreator.php",
      type: "POST",
      data: postData,
      success: function(data, textStatus, jqXHR) {
          alert('Success!');
      },
      error: function(jqXHR, textStatus, errorThrown) {
          alert('Error occurred!');
      }
  });
  e.preventDefault(); //STOP default action
  /* ends ajax submission process */
  });

  //function 2
  $("#add").click(function(e){
    for (var i = 0; i < $("#n").val(); i++) {
      $(".submit").before("<div id='question' class='question'><h6>Question " + ++counter + "</h6><input type='text' name='q" + counter + "' value=''></div>");
    }
  });
});
var counter = 1;
