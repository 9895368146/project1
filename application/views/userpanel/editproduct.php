<?php
$productpic = $product_det->product_pic == null ? 'assets/image/avatar_2x.png' : 'upload/userupload/productpic/'.$product_det->product_pic;

?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
					   <div class="login-content">
                        
						
						
						
                        <div class="login-form">
                            <form action="<?php echo base_url('index.php/userpanel/editproduct_action'); ?>" method="post" onsubmit="return validate();" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="<?php echo $product_det->id; ?>">    
								
								<div class="form-group">
                                    <label></label>
                                    
									
									
									
								<div class="form-group">
                                    <label>Category</label>
                                    <select class="au-input au-input--full" name="category" id="category" onchange="getsubcategory(this.value);">
									<?php foreach( $all_categories as $all_category){ ?>
									<option value="<?php echo $all_category->id; ?>" <?php if($all_category->id==$product_det->category){echo 'selected="selected"';} ?>><?php echo $all_category->category; ?></option>
									<?php } ?>
									</select>
                                </div>

								<div class="form-group" id="subcat_div">
                                    <label>Sub Category</label>
                                    <select class="au-input au-input--full" name="sub_category" id="sub_category">
									<?php foreach( $all_subcategories as $all_subcategory){ ?>
									<option value="<?php echo $all_subcategory->id; ?>" <?php if($all_subcategory->id==$product_det->sub_category){echo 'selected="selected"';} ?>><?php echo $all_subcategory->sub_category; ?></option>
									<?php } ?>
									</select>
                                </div>
								
								<div class="form-group">
                                    <label>Title</label>
                                    
									<input type="text" name="title" id="title" value="<?php echo $product_det->title; ?>">
                                </div>
									
	
								
								<div class="form-group">
                                    <label>Description</label>
                                    
									<textarea name="productdescription" id="productdescription"><?php echo $product_det->description; ?></textarea>
                                </div>
								
								<div class="img-upload">
  <img src="<?php echo base_url().$productpic; ?>" />

  <div class="overlay"></div>
  <div class="button"><div class="image-upload">
    <label for="file-input" class="forimage">
        Change Image
    </label>

    <input id="file-input" type="file" name="productpic" />
</div></div>
</div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Edit Product</button>
                               
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
	 if(category=="")
	 {
		 $("#category").focus();
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
			$("#sub_category").html(html);
		}
		
		
	});
	}
	else
	{
		$("#subcat_div").addClass('displaynone');
	}
}
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        CKEDITOR.replace( 'productdescription',
          {
			fullPage : true,
			uiColor : '#9AB8F3',
			toolbar : 'MyToolbar'

          });

			CKEDITOR.config.width = auto;
			config.extraPlugins = 'custimage';		
      });
    </script>	
	
<?php $this->load->view('userpanel/footer.php'); ?>