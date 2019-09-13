<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Enter OTP</h3>
                </div>
               

                <div class="panel-body">
				
				<?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
				  $userdatas = htmlspecialchars(json_encode($this->session->flashdata('reg_details')));
                   ?>
				
                    <form role="form" method="post" action="<?php echo base_url('index.php/users/otpverification'); ?>"  onsubmit="return validateotp();">
					<input class="form-control" name="userdatas" type="hidden" value="<?php echo $userdatas; ?>" >
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Enter OTP" id="otp" name="otp" type="text" maxlength="4" >
                            </div>
                            

                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="submit" >

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function validateotp()
{
	var otp = $("#otp").val();
	if(otp=="")
	{
		$("#otp").focus();
		return false;
	}
}
</script>

  </body>
</html>