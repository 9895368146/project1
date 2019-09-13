<?php
$profilepic = $user_primary_data->prof_pic == null ? 'assets/image/avatar_2x.png' : 'upload/userupload/profilepic/'.$user_primary_data->prof_pic;

?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
					   <div class="login-content">
                        
						
						
						
                        <div class="login-form">
                            <form action="<?php echo base_url('index.php/userpanel/update_user'); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
                                
								
								<div class="form-group">
                                    <label></label>
                                    
									
									
									<div class="img-upload">
  <img src="<?php echo base_url().$profilepic; ?>" />

  <p class="title">card title</p>
  <div class="overlay"></div>
  <div class="button"><div class="image-upload">
    <label for="file-input" class="forimage">
        Change Image
    </label>

    <input id="file-input" type="file" name="prof_img" />
</div></div>
</div>
									
									
	
								
								<div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Name" id="name" value="<?php echo $user_primary_data->name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" id="email" value="<?php echo $user_primary_data->email; ?>">
                                </div>
								<div class="form-group">
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone" id="phone" value="<?php echo $user_primary_data->phone; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" id="password">
                                </div>
								<div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password1" placeholder="Password Again" id="password1">
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Save Changes</button>
                               
                            </form>
                            
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

	
    </div>

	
	
	
	<script>
	
	 
  var myInput = document.getElementById("password");
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

	
	function validate()
 {
	 var name = $("#name").val();
	 var email = $("#email").val();
	 var password = $("#password").val();
	 var password1 = $("#password1").val();
	 var phone = $("#phone").val();
	 if(name=="")
	 {
		 $("#name").focus();
		 return false;
	 }
	 if(email=="")
	 {
		 $("#email").focus();
		 return false;
	 }
	 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(email) == false) 
            {
					 $("#email").focus();
		 return false;
			}
	
	 
	 if(phone=="")
	 {
		 $("#phone").focus();
		 return false;
	 }
	 if(password!="" && invalidpass==1)
	 {
		 $("#password").focus();
		 return false;
	 }
	 if(password != password1)
	 {
		 $("#password1").focus();
		 return false;
	 }
	 
	 
 }
	</script>
	
	
<?php $this->load->view('userpanel/footer.php'); ?>