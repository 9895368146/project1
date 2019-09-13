<?php
$admin_user_permission = json_decode($this->session->user_data_session->page_admin_users);
$registered_user_permission = json_decode($this->session->user_data_session->page_registered_users);
$category_user_permission = json_decode($this->session->user_data_session->page_category);
?>
<?php $this->load->view("admin/header"); ?>

<section id="module">
<div class="container white" style="min-height:300px;">
<div class="row">

<div class="col-lg-12">
<div class="edt-table">
<table id="myTable">  
        <thead>  
          <tr>  
            <th>S.No</th>  
            <th> Name </th>
			<th> Category </th>
			<th> Subcategory </th>
            <th>View</th>  
          </tr>  
        </thead>  
        <tbody>  
          
        <?php
		  
$i=0;
		  foreach($allrequestdet as $allrequest){ 
		  $i++;
		  ?>
          <tr>  
            <td><?php echo $i; ?></td>  
            <td><?php echo $allrequest->name; ?></td>
			<td><?php echo $allrequest->category; ?></td>
			<td><?php echo $allrequest->sub_category; ?></td>
         
            <td>
		
            
           
            
            
			<a href="<?php echo base_url(); ?>index.php/Adminpanel/requestdetails/<?php echo $allrequest->id; ?>" class="edit-btn"  data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-info-circle"></i></a></td>
			
		
			
			
          </tr> 

		  <?php } ?>
          
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
		window.location.replace("<?php echo base_url(); ?>index.php/Adminpanel/changestatus/kartwo_admin_users/"+id+"/"+status);
	}
}
function deleteuser(id)
{
	if(confirm("Do You want to Delete This User"))
	{
		window.location.replace("<?php echo base_url(); ?>index.php/Adminpanel/deleteuserbyid/kartwo_admin_users/"+id);
	}
}
</script>

</body>
</html>