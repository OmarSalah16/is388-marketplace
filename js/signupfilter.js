var canSubmit = false;
$(document).ready(function(){
  //function 1 submit override
  $('.box').submit(function(e) {
    if(!canSubmit)
    {
      e.preventDefault();
      alert("Invalid Info");
    }
  });
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePassword(password){
  var errors= "";
  var lowerCaseLetters = /[a-z]/g;
  if(!password.match(lowerCaseLetters)) {
    errors = errors.concat("Password must include lower case letters.<br>");
  }

  var upperCaseLetters = /[A-Z]/g;
  if(!password.match(upperCaseLetters)) {
    errors = errors.concat("Password must include upper case letters.<br>");
  }

  var numbers = /[0-9]/g;
  if(!password.match(numbers)) {
    errors = errors.concat("Password must include numbers.<br>");
  }

  var special = /[$-/:-?{-~!"^_`\[\]]/g;
  if(!password.match(special)) {
    errors = errors.concat("Password must include special characters.<br>");
  }

  if(password.length < 8 || password.length > 255) {
    errors = errors.concat("Password must be at least 8 characters and maximum 255 characters.<br>");
  }
  return errors;
}

function checkMobile(mobile){
  if(mobile.length != 11)
  return true;
  if(isNaN(mobile))
    return true;
  var reg = "0125";
  if(!reg.includes(mobile[2]))
    return true;
  if(mobile[0] != '0' && mobile[1] != '1')
    return true;
  else
      return false;
}

function checkForm(){
  var elements = document.getElementsByClassName("data");
  var formName = [];
  var formData = [];
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].value == "") {
      continue;
    }
    formName.push(elements[i].name);
    formData.push(elements[i].value);
  }
  var err = "";
  for (var i = 0; i < formName.length; i++) {
    formName[i]
    switch (formName[i]) {
      case "email":
        if(!validateEmail(formData[i])){
          err = err.concat("Invalid email.<br>")
        }
        break;
      case "password":
        var pw = validatePassword(formData[i]);
        if(pw.length>0){
          err = err.concat(pw);
        }
        break;
      case "Cpassword":
        var pass = document.getElementById("password").value;
        if(formData[i]!=pass)
        {
          err = err.concat("Passwords don't match.<br>")
        }
        break;
      case "mobile":
        if (checkMobile(formData[i])) {
          err = err.concat("Invalid Number.<br>");
        }
        break;
      default:
    }
    if (err=="") {
      canSubmit = true;
    }
    else {
      canSubmit = false;
    }
  }
function checkSubmit(){
  if(canSubmit)
    return true;
  else {
    alert("Invalid Info");
    return false;
  }
}
  document.getElementById("error").innerHTML = err;
}
