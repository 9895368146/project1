<?php $this->load->view("admin/header"); ?>

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>
				   <section id="album-create">
	<div class="container">
		<div class="edt-table">

                      <form role="form" method="post" action="<?php echo base_url('index.php/Adminpanel/changepass_action'); ?>" onsubmit="return validateregform();">
                          <div class="inner-page">
                             
 
                              
                              <div class="text-field">
                                  <input class="form-control" placeholder="Enter Current Password" name="current_password" id="current_password" type="password" value="">
                              </div>
 <br>
                             <div class="text-field">
                                  <input class="form-control" placeholder="Enter New Password" name="newpassword" id="newpassword" type="password" value="">
                              </div>
							  <br>
							  <div class="text-field">
                                  <input class="form-control" placeholder="Enter Password Again" name="newpassword1" id="newpassword1" type="password" value="">
                              </div>
 
                             
 <div class="btn-foot">
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="Submit" >
							  </div>
 </div>
                      </form>
					  
					  </div>
	</div>
</section>


<section id="shadow-bottom">
<div class="container">
<img src="<?php echo base_url(); ?>assets/image/shadow03.png" class="img-responsive" />
<div class="social">


</div>
</div>
</section>
					  
					  
					  
                 
 
 
 
 <script type="text/javascript">
function sync()
{
	
}
$( "#tog" ).click(function() {
$(this).find('i').toggleClass('fa-chevron-circle-right fa-chevron-circle-left ')		
if(sync.a==0||sync.a==undefined){	
$("#slide-menu").css("left","0px");
sync.a=1;
//alert(sync.a);

}else{
	$("#slide-menu").css("left","-306px");
	sync.a=0;
	//alert(sync.a);
	}
});


//------------toolptip-----------------
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
 

 <script>
 

 function validateregform()
 {
	 var current_password = $("#current_password").val();
	 var newpassword = $("#newpassword").val();
	 var newpassword1 = $("#newpassword1").val();
	 
	 if(current_password=="")
	 {
		 $("#current_password").focus();
		 return false;
	 }
	 if(newpassword=="")
	 {
		 $("#newpassword").focus();
		 return false;
	 }
	 
	 
	 if(newpassword!=newpassword1)
	 {
		 $("#newpassword1").focus();
		 return false;
	 }
	 
	 
 }


 
 </script>
 </body>
</html>
