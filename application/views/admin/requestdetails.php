<?php $this->load->view("admin/header"); ?>

<?php
$page_admin_users = json_decode($userdetails->page_admin_users);
$page_registered_users = json_decode($userdetails->page_registered_users);
$page_category = json_decode($userdetails->page_category);

?>
<?php $this->load->model("admin_action"); ?>
<section id="album-create">
	<div class="container">
		<div class="edt-table">
			<form name="addarticle" action="<?php echo base_url(); ?>index.php/Adminpanel/request">
				<div class="creat-new">		
					<h4>Request Details</h4>
				</div>

				<div class="inner-page">
			

					<div class="text-field">
						<label>Name</label>
						<input type="text" value="<?php echo $requestdet->name; ?>"  disabled>
					</div>
					
					
					<div class="text-field">
						<label>Category</label>
						<input type="email" value="<?php echo $requestdet->category; ?>" disabled>
					</div>

					<div class="text-field">
						<label>Subcategory</label>
						<input type="text" value="<?php echo $requestdet->sub_category; ?>" disabled>
					</div>
					
					<table class="table table-bordered">
				<tr>
				<th>S.No</th>
				<th>Product Title</th>
				<th>Company Name</th>
				
				</tr>
					<?php 
					$i=0;
					$productids = json_decode($requestdet->product_id);
					foreach($productids as $productid){
						$i++;
						
						$companyname = $this->admin_action->getcompanydetbyuserid($requestdet->user_id)->company_name;
						$productname = $this->admin_action->getproductdetbyid($productid)->title;

					?>
					
					
				<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $productname; ?></td>
				<td><?php echo $companyname; ?></td>
				
				</tr>
				
				
					
					<?php } ?>
				
				</table>
				
					
			
				
				
					
				
				
					<div class="btn-foot">
						<input type="submit" value="Back" class="bk-grad">
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


</body>
</html>

