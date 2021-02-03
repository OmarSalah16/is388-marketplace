$(document).ready(function(){
  $(".submit").click(function(){
    var sbj = $(".subject").val();
    var cont = $(".content").val();
    if(sbj==""||cont=="")
    {
      alert("fill form");
      return;
    }
    $.post("php/ticket.php",
    {
      subject: sbj,
      content: cont,
      q: "contact"
    },
    function(status){
      alert("Status: " + status);
    });
  });
});
