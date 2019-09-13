<?php
class User_model extends CI_model{
 
 
 
public function register_user($user){
 
 
$this->db->insert('kartwo_user', $user);
 
}
 
public function login_user($user_login){
 $email = $user_login['email'];
 $pass = $user_login['password'];
 //print_r($user_login);exit;
  $this->db->select('*');
  $this->db->from('kartwo_user');
 $this->db->where('email',$email);
 $this->db->where('password',$pass);
 $this->db->where('status',1);
 
  if($query=$this->db->get())
  {
      return $query->row();
  }
  else{
    return false;
  }
 
 
}
public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('kartwo_user');
  $this->db->where('email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
 
 
}
 
 
?>