<?php
class Company_model extends CI_model{
 
 public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->library('session');      
 
}


public function getcompanydetbyuserid($user_id)
{
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

public function getproductdetbyuserid($user_id)
{
	$this->db->select('*');
  $this->db->from('kartwo_product');
  $this->db->where('user_id',$user_id);
  $this->db->where('status',1);
  $query=$this->db->get()->result();
  if(!$query){
    return false;
  }else{
	return $query;
  }
}







 
 
}


 
 
?>