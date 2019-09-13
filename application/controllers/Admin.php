<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    

public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   //$this->load->model('login');
   $this->load->library('session');
	$this->load->model('Login');   
 
}	
	
public function index()
{
$this->load->view("admin/Login");
}

public function login()
{
	
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	
	if ($this->form_validation->run() == false) 
		{
			
			$this->load->view('admin/Login');
		}
	else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($userdetails = $this->Login->login($username, md5($password))) 
				{
					$this->session->set_userdata('user_data_session', $userdetails);
					$this->session->set_userdata('logged_in_admin', true);
					
					redirect('Adminpanel');
					
				}
			else
				{
					$this->load->view('admin/Login');
				}
			
		}
	
}

public function logout() {
		$error_msg = $this->session->flashdata('error_msg');
		$this->session->unset_userdata('user_data_session');
		$this->session->set_userdata('logged_in_admin', false);
		$this->session->set_flashdata('error_msg',$error_msg);
		redirect('admin');
	}


}

?>