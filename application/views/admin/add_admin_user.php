<?php $this->load->view("admin/header"); ?>

<section id="album-create">
	<div class="container">
		<div class="edt-table">
			<form name="addarticle" action="<?php echo base_url(); ?>index.php/Adminpanel/add_admin_user_action" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				<input type="hidden" name="action_type" value="ADD_ARTICLES" />
				<div class="creat-new">		
					<h4>Admin User</h4>
				</div>

				<div class="inner-page">
			

					<div class="text-field">
						<label>Name</label>
						<input type="text" name="name" id="name"  >
					</div>
					
					
					<div class="text-field">
						<label>E-mail</label>
						<input type="email" id="email" name="email">
					</div>

					<div class="text-field">
						<label>Phone</label>
						<input type="text" id="phone" name="phone">
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
			
				
				
					
				<div class="creat-new">		
					<h4>Permission</h4>
				</div>	
				<div>All Permission <input type="checkbox" id="selectall"></div>	
				<table class="table table-bordered">
				<tr>
				<th>Page</th>
				<th>View</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Status</th>
				<th>Add</th>
				</tr>
				<tr>
				<td>Admin Users</td>
				<td><input type="checkbox" name="admin_users_view" value="1"></td>
				<td><input type="checkbox" name="admin_users_edit" value="1"></td>
				<td><input type="checkbox" name="admin_users_delete" value="1"></td>
				<td><input type="checkbox" name="admin_users_status" value="1"></td>
				<td><input type="checkbox" name="admin_users_add" value="1"></td>
				</tr>
				<tr>
				<td>Registered Users</td>
				<td><input type="checkbox" name="registered_users_view" value="1"></td>
				<td><input type="checkbox" name="registered_users_edit" value="1"></td>
				<td><input type="checkbox" name="registered_users_delete" value="1"></td>
				<td><input type="checkbox" name="registered_users_status" value="1"></td>
				<td><input type="checkbox" name="registered_users_add" value="1"></td>
				</tr>
				<tr>
				<td>Category</td>
				<td><input type="checkbox" name="category_view" value="1"></td>
				<td><input type="checkbox" name="category_edit" value="1"></td>
				<td><input type="checkbox" name="category_delete" value="1"></td>
				<td><input type="checkbox" name="category_status" value="1"></td>
				<td><input type="checkbox" name="category_add" value="1"></td>
				</tr>
				<tr>
				<td>Request</td>
				<td><input type="checkbox" name="request_view" value="1"></td>
				
				</tr>
				</table>	
					
					
					
					
					
					
					
					

					<div class="btn-foot">
						<input type="submit" value="Create" class="bk-grad">
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
$('#selectall').trigger('change');


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
	 if(password=="")
	 {
		 $("#password").focus();
		 return false;
	 }
	 
	 if(password!=password1)
	 {
		 $("#password1").focus();
		 return false;
	 }
	 
	 
 }


</script>

</body>
</html>

