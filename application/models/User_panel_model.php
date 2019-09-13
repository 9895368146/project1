<?php
class User_panel_model extends CI_model{
 
 public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->library('session');      
 
}

public function getuserdetails($id){
 
  
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

public function update_user($data , $id){
 
	$this->db->where('id', $id);

	$this->db->update('kartwo_user', $data);
	
	return true;
 
}

public function getallcategories(){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_category');
  $this->db->where('status',1);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getallsubcategoriesbyid($catid){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_sub_category');
  $this->db->where('category',$catid);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function getcompanydetails($user_id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_company_profile');
  $this->db->where('user_id',$user_id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function update_company_prof($data , $id){
 
	$this->db->where('user_id', $id);

	$this->db->update('kartwo_company_profile', $data);
	
	return true;
 
}

public function insert_company_prof($data){
 
 
$this->db->insert('kartwo_company_profile', $data);
 
} 

public function company_prof_exist($user_id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_company_profile');
  $this->db->where('user_id',$user_id);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function insert_product($data){
 
 
$this->db->insert('kartwo_product', $data);
 
}

public function all_products_byuser($user_id){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_product');
  $this->db->where('user_id',$user_id);
  $query=$this->db->get()->result();

  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function productcatbyid($id){
 
  
  $this->db->select('category');
  $this->db->from('kartwo_category');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}
public function productsubcatbyid($id){
 
  
  $this->db->select('sub_category');
  $this->db->from('kartwo_sub_category');
  $this->db->where('id',$id);
  $query=$this->db->get()->row();
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

public function deletebyid($table , $id)
{
	$this->db->delete($table, array('id' => $id));
	return true;
}

public function getproductbyid($productid){
 
  
  $this->db->select('*');
  $this->db->from('kartwo_product');
  $this->db->where('id',$productid);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function update_product($data , $id){
 
	$this->db->where('id', $id);

	$this->db->update('kartwo_product', $data);
	
	return true;
 
}

public function getproductbysubcat($subcat){
 
  
  $this->db->select('kartwo_product.id , kartwo_company_profile.company_name, kartwo_company_profile.user_id');
  $this->db->from('kartwo_product');
  $this->db->join('kartwo_company_profile', 'kartwo_product.user_id = kartwo_company_profile.user_id' , 'inner');
  $this->db->where('kartwo_product.sub_category',$subcat);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
 
}

public function send_request($requestdet)
{
	
	if($this->db->insert('kartwo_request', $requestdet))
	{
		$productids = json_decode($requestdet['product_id']);
		foreach($productids as $productid)
		{
			$companydet = $this->getcompanydetbyproductid($productid);
			$userdetils = $this->getuserdetails($requestdet['user_id']);
			$from = 'info@kartwo.com';
			$to = $companydet->email;
			$subject = 'Enquiry From Kartwo Website';
			$message = '<p>Dear '.$companydet->company_name.'</p><p>You have an enquiry from '.$userdetils->name.'.</p>';
			$this->sendPHPmail($from,$to,$subject,$message);
		}
		
		return true;
	}
	else
	{
		return false;
	}
	
}

public function getcompanydetbyproductid($productid)
{
	$this->db->select('kartwo_company_profile.company_name , kartwo_company_profile.email');
  $this->db->from('kartwo_company_profile');
  $this->db->join('kartwo_product', 'kartwo_product.user_id = kartwo_company_profile.user_id' , 'inner');
  $this->db->where('kartwo_product.id',$productid);
  $query=$this->db->get()->row();
  if(!$query){
    return false;
  }else{
	return $query;
  }
}





public function sendPHPmail($from,$to,$subject,$message)
{
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <'.$from.'>' . "\r\n";

$send = mail($to,$subject,$message,$headers);
if($send)
{
	return true;
}
else{
	return false;
}
}

 
 
}


 
 
?>