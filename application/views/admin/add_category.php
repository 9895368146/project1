<?php $this->load->view("admin/header"); ?>

<section id="album-create">
	<div class="container">
		<div class="edt-table">
			<form name="addarticle" action="<?php echo base_url(); ?>index.php/Adminpanel/add_category_action" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				<div class="creat-new">		
					<h4>Add Category</h4>
				</div>

				<div class="inner-page">
			

					<div class="text-field">
						<label>Category</label>
						<input type="text" name="category" id="category"  >
					</div>
					
					<div class="text-field">
						
					</div>
					
					
			<div class="text-field">
						<label>Sub Category</label>
					</div>		
			
				
				
					<div class="field_wrapper">
    <div>
        <input type="text" name="sub_cat[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/image/add-icon.png"/></a>
    </div>
</div>
					
					
					
					
					
					
					
					
					

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
	 var category = $("#category").val();
	
	 if(category=="")
	 {
		 $("#category").focus();
		 return false;
	 }
	 
	 
	 
 }


</script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sub_cat[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="<?php echo base_url(); ?>assets/image/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
</body>
</html>

