<?php $this->load->view("admin/header"); ?>

<section id="album-create">
	<div class="container">
		<div class="edt-table">
			<form name="addarticle" action="<?php echo base_url(); ?>index.php/Adminpanel/edit_reg_user_action/<?php echo $reg_userdetails->id; ?>" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				<input type="hidden" name="action_type" value="ADD_ARTICLES" />
				<div class="creat-new">		
					<h4>Registered User</h4>
				</div>

				<div class="inner-page">
			

					<div class="text-field">
						<label>Name</label>
						<input type="text" name="name" id="name" value="<?php echo $reg_userdetails->name; ?>"  >
					</div>
					
					
					<div class="text-field">
						<label>E-mail</label>
						<input type="email" id="email" name="email" value="<?php echo $reg_userdetails->email; ?>">
					</div>

					<div class="text-field">
						<label>Phone</label>
						<input type="text" id="phone" name="phone" value="<?php echo $reg_userdetails->phone; ?>">
					</div>
				
				<div class="text-field">
						<label>Password</label>
						<input type="password" id="password" name="password">
					</div>
				
					<div class="text-field">
						
					</div>
				<div class="text-field">
						<label>Password Again</label>
						<input type="password" id="password1" name="password1">
					</div>
			
				
				
					
				
				
					
					
					
					
					
					
					
					
					

					<div class="btn-foot">
						<input type="submit" value="Update" class="bk-grad">
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
$('#selectall').change(function () {
    if ($(this).prop('checked')) {
        $('input').prop('checked', true);
    } else {
        $('input').prop('checked', false);
    }
});



function validate()
 {
	 var name = $("#name").val();
	 var email = $("#email").val();
	 var phone = $("#phone").val();
	 var password = $("#password").val();
	 var password1 = $("#password1").val();
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
	 if(password!=password1 && password!='')
	 {
		 $("#password1").focus();
		 return false;
	 }

	 
	 
 }


</script>

</body>
</html>

