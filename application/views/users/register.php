<html>
  <head>
    <meta charset="utf-8">
    <title>Login Registration</title>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
 
 
  </head>
  <body>
<style>

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style> 
<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Please do Registration here</h3>
                  </div>
                  <div class="panel-body">
 
                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('index.php/users/register_user'); ?>" onsubmit="return validateregform();">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Name" name="user_name" id="user_name" type="text" autofocus>
                              </div>
 
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter E-mail" name="user_email" id="user_email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password" name="user_password" id="user_password" type="password" value="">
                              </div>
 
                             <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password Again" name="user_password1" id="user_password1" type="password" value="">
                              </div>
 
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter 10 diMobile No" name="user_mobile" id="user_mobile" type="number" value="">
                              </div>
 
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >
 
                          </fieldset>
                      </form>
					  
					  
					  
                      <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url('index.php/users/login_view'); ?>"> Please Login</a></center><!--for centered text-->
                  </div>
              </div>
			  <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
          </div>
		  
		  
		  
		  
		  
      </div>
  </div>
 
 
 
 
 
</span>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>
 
  var myInput = document.getElementById("user_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var invalidpass = 1;

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
	invalidpass = 0;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	invalidpass = 1;
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
	invalidpass = 0;
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
	invalidpass = 1;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
	invalidpass = 0;
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
	invalidpass = 1;
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
	invalidpass = 0;
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
	invalidpass = 1;
  }
}
 
 
 
 function validateregform()
 {
	 var user_name = $("#user_name").val();
	 var user_email = $("#user_email").val();
	 var user_password = $("#user_password").val();
	 var user_password1 = $("#user_password1").val();
	 var user_mobile = $("#user_mobile").val();
	 if(user_name=="")
	 {
		 $("#user_name").focus();
		 return false;
	 }
	 if(user_email=="")
	 {
		 $("#user_email").focus();
		 return false;
	 }
	 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(user_email) == false) 
            {
					 $("#user_email").focus();
		 return false;
			}
	 if(user_password=="")
	 {
		 $("#user_password").focus();
		 return false;
	 }
	 if(invalidpass==1)
	 {
		 $("#user_password").focus();
		 return false;
	 }
	 if(user_password!=user_password1)
	 {
		 $("#user_password1").focus();
		 return false;
	 }
	 if(user_mobile=="")
	 {
		 $("#user_mobile").focus();
		 return false;
	 }
	 
 }


 
 </script>
 
 
  </body>
</html>