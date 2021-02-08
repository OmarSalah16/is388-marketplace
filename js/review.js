function review(id) {
  var review = document.getElementById("review").value;
  var rating = document.getElementById("rating").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","review.php?review="+review+"&rating="+rating,true);
  xmlhttp.send();
}