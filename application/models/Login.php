<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Model {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	function login($username, $password) {
		
		$this->db->select('*');
		$this->db->from('kartwo_admin_users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', '1');
		$query = $this->db->get()->row();
		
		if (!empty($query)) {
			
			return $query;
			
		} else {
			
			return false;
			
		}
		
	}


	
	
	
}
?>