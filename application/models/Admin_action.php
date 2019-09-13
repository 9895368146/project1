<?php
class Admin_action extends CI_model{
 
public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->library('session');      
 
}
 
public function pass_check($password){
 
  $login_admin_id = $this->session->user_data_session->id;
  
  $this->db->select('password');
  $this->db->from('kartwo_admin_users');
  $this->db->where('id',$login_admin_id);
  $query=$this->db->get();
  $dbpassword = $query->row('password');
 
  if($dbpassword != $password){
    return false;
  }else{
    return true;
  }
 
}
public function changepass_action($password){
 
  //update query
	  $data = array( 
		'password'      => $password
	);

	$this->db->where('id', $this->session->user_data_session->id);

	$this->db->update('kartwo_admin_users', $data);
	
	return true;
 
}
 
public function getAllregisteredUsers(){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_user');
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
} 

public function insert_adminusers($user){
 
 
$this->db->insert('kartwo_admin_users', $user);
 
}

public function getAlladminUsers(){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_admin_users');
  $this->db->where('id !=',1);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function changestatus($table , $id , $status){
 
  //update query
	  $data = array( 
		'status'      => $status
	);

	$this->db->where('id', $id);

	$this->db->update($table, $data);
	
	return true;
 
}

public function deleteuserbyid($table , $id)
{
	$this->db->delete($table, array('id' => $id));
	return true;
}

public function getAdminuserById($id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_admin_users');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function update_adminusers($admin_user_det , $id){
 


	$this->db->where('id', $id);

	$this->db->update('kartwo_admin_users', $admin_user_det);
	
	return true;
 
}

public function getReguserById($id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_user');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function update_regusers($reg_user_det , $id){
 


	$this->db->where('id', $id);

	$this->db->update('kartwo_user', $reg_user_det);
	
	return true;
 
}

public function getAllcategory(){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_category');
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function deletecatbyid($table , $id)
{
	$this->db->delete($table, array('id' => $id));
	$this->db->delete('kartwo_sub_category', array('category' => $id));
	return true;
}

public function add_category_action($categories , $sub_cat){
 
$this->db->insert('kartwo_category', $categories);
$cat_id = $this->db->insert_id();
 
 foreach($sub_cat as $sub_cats)
 {
	  if(!empty($sub_cats)){
	 $subcat['category'] = $cat_id;
	 $subcat['sub_category'] = $sub_cats;
	 $this->db->insert('kartwo_sub_category', $subcat);
	 $subcat = array();
	 
			}
 }

}

public function getCategorybyId($id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_category');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}
public function getsubCategorybyId($id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_sub_category');
  $this->db->where('category',$id);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function edit_category_action($categories , $sub_cat , $id , $subcatprevid , $sub_cat_prev){
 
	$this->db->where('id', $id);
	$this->db->update('kartwo_category', $categories);

 
 $subcatprevids = explode("|",$subcatprevid);
 
 $k=0;
 foreach($sub_cat_prev as $sub_cat_prevs)
 {
	$sub_tbl_id =  $subcatprevids[$k];
	if(empty($sub_cat_prevs))
	{
		$this->db->delete('kartwo_sub_category', array('id' => $sub_tbl_id));
	}
	$this->db->set('sub_category', $sub_cat_prevs);
	$this->db->where('id', $sub_tbl_id);
	$this->db->update('kartwo_sub_category');
	 
	$k++; 
 }
 
 
 foreach($sub_cat as $sub_cats)
 {
	  if(!empty($sub_cats)){
	 $subcat['category'] = $id;
	 $subcat['sub_category'] = $sub_cats;
	 $this->db->insert('kartwo_sub_category', $subcat);
	 $subcat = array();
	 
		}
 }

}
public function deletesubcatbyid($table , $id , $catid)
{
	$this->db->delete($table, array('id' => $id));
	return true;
}

public function getallrequest(){
 
  
  $this->db->select('kartwo_request.id , kartwo_category.category , kartwo_sub_category.sub_category , kartwo_user.name');
  $this->db->from('kartwo_request');
  $this->db->join('kartwo_category' , 'kartwo_category.id = kartwo_request.category' , 'join');
  $this->db->join('kartwo_sub_category' , 'kartwo_sub_category.id = kartwo_request.sub_category' , 'join');
  $this->db->join('kartwo_user' , 'kartwo_user.id = kartwo_request.user_id' , 'join');
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getcompanydetbyuserid($userid){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_company_profile');
  $this->db->where('user_id' , $userid);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getproductdetbyid($productid){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_product');
  $this->db->where('id' , $productid);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getsubCatbyId($id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_sub_category');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getRequestbuId($id){
 
  
  $this->db->select('kartwo_request.id , kartwo_request.user_id , kartwo_request.product_id , kartwo_category.category , kartwo_sub_category.sub_category , kartwo_user.name');
  $this->db->from('kartwo_request');
  $this->db->join('kartwo_category' , 'kartwo_category.id = kartwo_request.category' , 'join');
  $this->db->join('kartwo_sub_category' , 'kartwo_sub_category.id = kartwo_request.sub_category' , 'join');
  $this->db->join('kartwo_user' , 'kartwo_user.id = kartwo_request.user_id' , 'join');
  $this->db->where('kartwo_request.id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}
  
 
}
 
 
?>