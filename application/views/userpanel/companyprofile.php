<?php
$company_logo = $company_data->company_logo == null ? 'assets/image/avatar_2x.png' : 'upload/userupload/companylogo/'.$company_data->company_logo;

?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
					   <div class="login-content">
                        
						
						
						
                        <div class="login-form">
                            <form action="<?php echo base_url('index.php/userpanel/update_company_prof'); ?>" method="post" enctype="multipart/form-data">
                                
								
								<div class="form-group">
                                    <label></label>
                                    
									
									
								<?php if(!empty($company_data->company_name)  && !empty($company_data->address) && !empty($company_data->phone) && !empty($company_data->email) && !empty($company_data->company_logo))
								{
									echo '<a href="'.base_url("index.php/company/").$company_data->user_id.'" target="_blank" class="au-btn au-btn--green m-b-20">Visit My Page</a>';
								} ?>	
								
									
	
								
								<div class="form-group">
                                    <label>Company Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Name" id="name" value="<?php if(!empty($company_data->company_name)){echo $company_data->company_name;} ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="au-input au-input--full" name="address" placeholder="address" id="address" ><?php if(!empty($company_data->address)){echo $company_data->address;} ?></textarea>
									
                                </div>
								<div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="au-input au-input--full" name="short_description" placeholder="Sort Description" id="short_description" ><?php if(!empty($company_data->short_description)){echo $company_data->short_description;} ?></textarea>
									
                                </div>
								<div class="form-group">
                                    <label>Description</label>
                                    
									<textarea name="companydescription" id="companydescription"><?php if(!empty($company_data->description)){echo $company_data->description;} ?></textarea>
                                </div>
								<div class="form-group">
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone" id="phone" value="<?php if(!empty($company_data->phone)){echo $company_data->phone;} ?>">
                                </div>
								
								<div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" id="email" value="<?php if(!empty($company_data->email)){echo $company_data->email;} ?>" >
                                </div>
								
								<label>Company Logo</label>
								<div class="img-upload">
  <img src="<?php echo base_url().$company_logo; ?>" />

  <div class="overlay"></div>
  <div class="button"><div class="image-upload">
    <label for="file-input" class="forimage">
        Change Logo
    </label>

    <input id="file-input" type="file" name="company_logo" />
</div></div>
</div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Save Changes</button>
                               
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

	
	

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        CKEDITOR.replace( 'companydescription',
          {
			fullPage : true,
			uiColor : '#9AB8F3',
			toolbar : 'MyToolbar'

          });

			//CKEDITOR.config.width = auto;
			//config.extraPlugins = 'custimage';		
      });
    </script>	

	
<?php $this->load->view('userpanel/footer.php'); ?>