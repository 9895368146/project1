<?php
$admin_user_permission = json_decode($this->session->user_data_session->page_admin_users);
$registered_user_permission = json_decode($this->session->user_data_session->page_registered_users);
$category_user_permission = json_decode($this->session->user_data_session->page_category);
?>
<?php $this->load->view("admin/header"); ?>



<section id="module">
<div class="container white" style="min-height:300px;">
<div class="row">
<?php if($category_user_permission[4]==1){ ?>
<div class="col-lg-12">
<a href="<?php echo base_url(); ?>index.php/Adminpanel/add_category" class="bk-grad add-album">Create Category<i class="fa fa-plus-square"></i></a>
</div>
<?php } ?>
<div class="col-lg-12">
<div class="edt-table">
<table id="myTable">  
        <thead>  
          <tr>  
            <th>S.No</th>  
            <th> Category </th>
			<th> Status </th>
			  
          </tr>  
        </thead>  
        <tbody>  
          <?php
if(is_array($categories)){		  
$i=0;
		  foreach($categories as $category){ 
		  $i++;
		  ?>
          <tr>  
            <td><?php echo $i; ?></td>  
            <td><?php echo $category->category; ?></td>
			
         
            <td>
		
            <?php if($category_user_permission[3]==1){ ?>
			<a href="javascript:ChangeStatus('<?php echo $category->id; ?>','<?php echo $category->status; ?>')" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Change Status" style="color:<?php if($category->status==0){echo'#BCC7D1';}else{echo '#337ab7';} ?>"><i class="fa fa-check-circle"></i></a>
			<?php } ?>
           
            <?php if($category_user_permission[1]==1){ ?>
			<a href="<?php echo base_url(); ?>index.php/Adminpanel/edit_category/<?php echo $category->id; ?>" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-pencil-square-o"></i></a>
			<?php } ?>
            
            <?php if($category_user_permission[2]==1){ ?>
			<a href="javascript:deleteuser('<?php echo $category->id ?>')" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="Delete User"><i class="fa fa-times-circle"></i></a></td>
			<?php } ?>			
			
		
			
			
          </tr> 

<?php } } ?>		  
          
        </tbody>  
      </table>
      </div>
</div>
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
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<script>
function ChangeStatus(id , status)
{
	if(confirm("Do You want to change Status"))
	{
		window.location.replace("<?php echo base_url(); ?>index.php/Adminpanel/changestatuscat/kartwo_category/"+id+"/"+status);
	}
}
function deleteuser(id)
{
	if(confirm("Do You want to Delete This User"))
	{
		window.location.replace("<?php echo base_url(); ?>index.php/Adminpanel/deletecatbyid/kartwo_category/"+id);
	}
}
</script>
</body>
</html>