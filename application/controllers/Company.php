<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Company extends CI_Controller {
    

public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->model('company_model');
   $this->load->library('session');      
 
}	
	
public function index($user_id)
{
	$companydetails['companydetails'] = $this->company_model->getcompanydetbyuserid($user_id);
	$companydetails['productdetails'] = $this->company_model->getproductdetbyuserid($user_id);
	$this->load->view("company/website.php",$companydetails);
}

public function sendmessage()
{
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$msg_subject = $this->input->post('subject');
	$message = $this->input->post('message');
	$tomail = $this->input->post('tomail');
	$user_id = $this->input->post('user_id');
	
	$from = 'info@kartwo.com';
	$to = $tomail;
	$subject = 'Message From Kartwo Website';
	$message = '<table><tr><td>Name</td><td> : </td><td>'.$name.'</td></tr>
	<tr><td>Email</td><td> : </td><td>'.$email.'</td></tr>
	<tr><td>Subject</td><td> : </td><td>'.$msg_subject.'</td></tr>
	<tr><td>Message</td><td> : </td><td>'.$message.'</td></tr></table>';
	
	$this->sendPHPmail($from,$to,$subject,$message);
	
	$this->session->set_flashdata('message', 'Message Send Successfully');
	redirect('company/'.$user_id.'');
	
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


function _remap($method,$args)
{

    if (method_exists($this, $method))
    {
	       $this->$method($args);
    }
    else
    {
        $this->index($method,$args);
    }

}


}