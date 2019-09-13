
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
					   <div class="login-content">
                        
						<p class="flash_msg"><?php echo $this->session->flashdata('request_success'); ?></p>
						
						
                        <div class="login-form">
                            <form action="<?php echo base_url('index.php/userpanel/send_request'); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
                            
<input type="hidden" name="user_id" value="<?php echo $user_primary_data->id; ?>">							
								
								<div class="form-group">
                                    <label></label>
                                    
									
									
									
								<div class="form-group">
                                    <label>Category</label>
                                    <select class="au-input au-input--full" name="category" id="category" onchange="getsubcategory(this.value);">
									<option value="">--Select Category--</option>
									<?php foreach( $all_categories as $all_category){ ?>
									<option value="<?php echo $all_category->id; ?>"><?php echo $all_category->category; ?></option>
									<?php } ?>
									</select>
                                </div>

								<div class="form-group displaynone" id="subcat_div">
                                    <label>Sub Category</label>
                                    <select class="au-input au-input--full" name="sub_category" id="sub_category" onchange="getcompany(this.value);">
									
									</select>
                                </div>
								
								<div class="form-group displaynone" id="company_div">
								<p id="company_error"></p>
                                    <label>Company</label>
                                    <div id="select_company" >
									
									</div>
                                </div>
									
	
								
								
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Send Request</button>
                               
                            </form>
                            
                        </div>
                    </div>
					  
					  
					   
					   
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

	
    </div>

	
	
	
	<script>
	
	function validate()
 {
	 var category = $("#category").val();
	 var sub_category = $("#sub_category").val();
	 var product_ids = $("#product_ids").val();
	 if(category=="")
	 {
		 $("#category").focus();
		 return false;
	 }
	 if(sub_category=="")
	 {
		 $("#sub_category").focus();
		 return false;
	 }
	 if(product_ids == 'null')
	 {
		 $("#product_ids").focus();
		 $("#company_error").html('Company not available');
		 return false;
	 }

	 
	 
 }
	</script>
	
<script>
function getsubcategory(cat)
{
	if(cat!=''){
		$("#subcat_div").removeClass('displaynone');
	$.ajax({
		
		type : 'post',
		url : '<?php echo base_url("index.php/userpanel/getsubcategory"); ?>',
		data : {cat_id : cat},
		success : function html(html)
		{
			html = '<option value="">--Select Subcategory--</option>'+html;
			$("#sub_category").html(html);
		}
		
		
	});
	}
	else
	{
		$("#subcat_div").addClass('displaynone');
	}
}

function getcompany(subcat)
{
	if(subcat!=''){
		$("#company_div").removeClass('displaynone');
	$.ajax({
		
		type : 'post',
		url : '<?php echo base_url("index.php/userpanel/getcompanybysubcat"); ?>',
		data : {subcat : subcat},
		success : function html(html)
		{
			$("#select_company").html(html);
		}
		
		
	});
	}
	else
	{
		$("#company_div").addClass('displaynone');
	}
}
</script>
	
<?php $this->load->view('userpanel/footer.php'); ?>