function viewSurveys() {
  var formData = new FormData();
  formData.append("q","view");
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","php/survey.php",true);
  xmlhttp.send(formData);
}

function deleteSurvey(ID) {
  var formData = new FormData();
  formData.append("q","delete");
  formData.append("ID",ID);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      viewSurveys();
    }
  }
  xmlhttp.open("POST","php/survey.php",true);
  xmlhttp.send(formData);
}

function selectAll(){
  var elements = document.getElementsByClassName("select");
  for (var i = 0; i < elements.length; i++) {
    elements[i].checked = !elements[i].checked;
  }
}
