
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
					   <div class="login-content">
                        
						
						
						
                        <div class="login-form">
                            
							<div style="float:right;">
<a href="<?php echo base_url(); ?>index.php/userpanel/addproduct" class="bk-grad add-album">Create Product<i class="fa fa-plus-square"></i></a>
</div>

					<div class="edt-table">		
							<table id="myTable">  
        <thead>  
          <tr>  
            <th>S.No</th>  
            <th> Category </th>
			<th> Sub Category </th>
			<th> Status </th>
			  
          </tr>  
        </thead>  
        <tbody>  
          <?php
if($products_byuser){		  
$i=0;
		  foreach($products_byuser as $product_byuser){ 
		  $i++;
		  ?>
          <tr>  
            <td><?php echo $i; ?></td>  
            <td><?php echo $product_byuser['category']; ?></td>
			<td><?php echo $product_byuser['sub_category']; ?></td>
			
         
            <td>
		
			<a href="javascript:ChangeStatus('<?php echo $product_byuser['id']; ?>','<?php echo $product_byuser['status']; ?>')" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Change Status" style="color:<?php if($product_byuser['status']==0){echo'#BCC7D1';}else{echo '#337ab7';} ?>"><i class="fa fa-check-circle"></i></a>
           
			<a href="<?php echo base_url(); ?>index.php/userpanel/editproduct/<?php echo $product_byuser['id']; ?>" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-pencil-square-o"></i></a>
            
			<a href="javascript:deleteproduct('<?php echo $product_byuser['id']; ?>')" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Delete User"><i class="fa fa-times-circle"></i></a></td>
			
		
			
			
          </tr> 

<?php } } ?>		  
          
        </tbody>  
      </table>
	  </div>
							
							
                            
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

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<script>
function ChangeStatus(id , status)
{
	if(confirm("Do You want to change Status"))
	{
		window.location.replace("<?php echo base_url(); ?>index.php/userpanel/changestatus/kartwo_product/"+id+"/"+status);
	}
}
function deleteproduct(id)
{
	if(confirm("Do You want to Delete This Product"))
	{
		window.location.replace("<?php echo base_url(); ?>index.php/userpanel/deletebyid/kartwo_product/"+id);
	}
}
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>	
	
<?php $this->load->view('userpanel/footer.php'); ?>