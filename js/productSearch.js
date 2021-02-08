function showProducts() {
  var select = document.getElementById("searchBy").value;
  var bar = document.getElementById("searchBar").value;
  var range1 = document.getElementById("range1").value;
  var range2 = document.getElementById("range2").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rTable").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","php/productSearch.php?select="+select+"&bar="+bar+"&q=view&range1="+range1+"&range2="+range2,true);
  xmlhttp.send();
}

function selectChange(){

   var select = document.getElementById("searchBy").value;
   var range1 = document.getElementById("range1");
   var range2 = document.getElementById("range2");
   var label = document.getElementById("label");
   if(select=="Price")
   {

    range1.style.display="block";
    range2.style.display="block";
    label.style.display="block";

   }
   else
   {
    range1.style.display="none";
    range2.style.display="none";
    label.style.display="block";

   }
   showProducts();
}

function addToCart(id){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) { 
    document.getElementById("rTable").innerHTML=this.responseText;    
    }
  }
  xmlhttp.open("GET","php/productSearch.php?ID="+id+"&q=cart",true);
  xmlhttp.send();
}


function viewProduct(id){
  // var xmlhttp=new XMLHttpRequest();
  // xmlhttp.onreadystatechange=function() {
  //   if (this.readyState==4 && this.status==200) {
  //     alert("added");
      
  //   }
  // }
  // xmlhttp.open("GET","php/product.php?ID="+id+"&q=view",true);
  // xmlhttp.send();
  window.location.href = "product.php?ID="+id;
}
// function view_add(){
//   var add = document.getElementById("addOrder");
//   var view = document.getElementById("viewOrder");
//   var btn = document.getElementById("addBtn");
//   document.getElementById("submitABtn").style.display = "block";
//   document.getElementById("submitEBtn").style.display = "none";

// }
