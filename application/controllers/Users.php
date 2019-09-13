<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    

public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->model('user_model');
   $this->load->library('session');      
 
}	
	
public function register()
{

$this->load->view("users/register.php");
}


public function register_user(){
 
      $user=array(
      'name'=>$this->input->post('user_name'),
      'email'=>$this->input->post('user_email'),
	  'password'=>md5($this->input->post('user_password')),
      'phone'=>$this->input->post('user_mobile')
        );

		$this->session->set_flashdata('reg_details', $user);
		
		$email_check=$this->user_model->email_check($user['email']);
		
		$generator = "1357902468"; 
		$otp = ""; 
		 for ($i = 1; $i <= 4; $i++) { 
				$otp .= substr($generator, (rand()%(strlen($generator))), 1); 
			} 
		  
		$this->session->set_flashdata('otp', $otp);

		$from = 'info@kartwo.com';
		$to = $user['email'];
		//$to = 'roobin1092@gmail.com';
		$subject = 'Kartwo Registration OTP Details';
		$message = '<p><b>Dear '.$user['name'].'</b></p><p>Your OTP for Kartwo Registration is <b>'.$otp.'</b>. Do not share OTP for security reasons</p>';
		
 
if($email_check){
	
	$this->sendPHPmail($from,$to,$subject,$message);
	$this->load->view("users/otp.php");

 
}
else{
 
  $this->session->set_flashdata('error_msg', 'Email Id Already Registered.');
  redirect('users/register');
 
 
}
 
}

public function otpverification(){
 
 $otp_submitted = $this->input->post('otp');
 $otp_generated = $this->session->flashdata('otp');
 $userdata = json_decode(htmlspecialchars_decode($this->input->post('userdatas')));

 if($otp_submitted == $otp_generated)
 {
 $this->user_model->register_user($userdata);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('users/login_view');
 }
 else
 {
	  $this->session->set_flashdata('error_msg', 'OTP Mismatch,Try again.');
	  
		redirect('users/register');
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



public function otp_view(){
 
$this->load->view("users/otp.php");
 
}


public function login_view(){
 
$this->load->view("users/login.php");
 
}

function login_user(){ 
  $user_login=array(
 
  'email'=>$this->input->post('user_email'),
  //'password'=>$this->input->post('user_password')
  'password'=>md5($this->input->post('user_password'))
 
    ); 
//$user_login['user_email'],$user_login['user_password']
    $data['users_details']=$this->user_model->login_user($user_login);
    if($data)
      {
   
        $this->session->set_userdata('logged_in_user',$data['users_details']);
        
  
        redirect('userpanel');
 
    }
    else{
      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  $this->load->view("users/login.php");
 
 }
 
 
}

}