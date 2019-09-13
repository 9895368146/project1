<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanel extends CI_Controller {
    

public function __construct(){
 
        parent::__construct();
		$this->load->helper(array('url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('admin_action');
		
		// to protect the controller to be accessed only by registered users
	    if(!$this->session->userdata('logged_in_admin')){
			
			redirect('admin/Login', 'refresh');
			 		
		}
     
 
}	
	
public function index()
{
$this->load->view("admin/dashboard");
}

public function changepassword()
{
	$this->load->view("admin/changepassword");
}

public function changepass_action()
{
	$current_password = $this->input->post('current_password');
	$newpassword = $this->input->post('newpassword');
	$newpassword1 = $this->input->post('newpassword1');
	
	if(!$this->admin_action->pass_check($current_password))
	{
		$this->session->set_flashdata('error_msg', 'Try again.');
	  
		redirect('Adminpanel/changepassword');
	}
	else
	{
		$this->admin_action->changepass_action(md5($newpassword));
		$this->session->set_flashdata('error_msg', 'Password changed , Please Login.');
		
		redirect('admin/logout');
	}
}

public function admin_users()
{
	$alladminusers = $this->admin_action->getAlladminUsers();
	$data['admin_users'] = $alladminusers;
	$this->load->view("admin/admin_users",$data);
}

public function registered_users()
{
	$allregisteredusers = $this->admin_action->getAllregisteredUsers();
	$data['reg_users'] = $allregisteredusers;
$this->load->view("admin/registered_users",$data);
}

public function add_admin_user()
{
$this->load->view("admin/add_admin_user");
}

public function add_admin_user_action()
{
	$admin_users_view = $this->input->post('admin_users_view') == null ? 0 : $this->input->post('admin_users_view');
	$admin_users_edit = $this->input->post('admin_users_edit') == null ? 0 : $this->input->post('admin_users_edit');
	$admin_users_delete = $this->input->post('admin_users_delete') == null ? 0 : $this->input->post('admin_users_delete');
	$admin_users_status = $this->input->post('admin_users_status') == null ? 0 : $this->input->post('admin_users_status');
	$admin_users_add = $this->input->post('admin_users_add') == null ? 0 : $this->input->post('admin_users_add');
	
	$page_admin_users = json_encode(array($admin_users_view,$admin_users_edit,$admin_users_delete,$admin_users_status,$admin_users_add));
	
	$registered_users_view = $this->input->post('registered_users_view') == null ? 0 : $this->input->post('registered_users_view');
	$registered_users_edit = $this->input->post('registered_users_edit') == null ? 0 : $this->input->post('registered_users_edit');
	$registered_users_delete = $this->input->post('registered_users_delete') == null ? 0 : $this->input->post('registered_users_delete');
	$registered_users_status = $this->input->post('registered_users_status') == null ? 0 : $this->input->post('registered_users_status');
	$registered_users_add = $this->input->post('registered_users_add') == null ? 0 : $this->input->post('registered_users_add');
	
	$page_registered_users = json_encode(array($registered_users_view,$registered_users_edit,$registered_users_delete,$registered_users_status,registered_users_add));
	
	$category_view = $this->input->post('category_view') == null ? 0 : $this->input->post('category_view');
	$category_edit = $this->input->post('category_edit') == null ? 0 : $this->input->post('category_edit');
	$category_delete = $this->input->post('category_delete') == null ? 0 : $this->input->post('category_delete');
	$category_status = $this->input->post('category_status') == null ? 0 : $this->input->post('category_status');
	$category_add = $this->input->post('category_add') == null ? 0 : $this->input->post('category_add');
	
	$page_category = json_encode(array($category_view,$category_edit,$category_delete,$category_status,$category_add));
	
	$request_view = $this->input->post('request_view') == null ? 0 : $this->input->post('request_view');
		
	$page_request = json_encode(array($request_view));
	
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$username = $this->input->post('email');
	$password = $this->input->post('password');
	
	$admin_user_det=array(
      'name'=>$name,
      'email'=>$email,
	  'password'=>md5($password),
      'phone'=>$phone,
	  'username'=>$username,
	  'page_admin_users'=>$page_admin_users,
	  'page_registered_users'=>$page_registered_users,
	  'page_category'=>$page_category,
	  'page_request'=>$page_request,
	  'status'=>1
        );
	
	$this->admin_action->insert_adminusers($admin_user_det);
	redirect('Adminpanel/admin_users');
	
}

public function changestatus($table , $id , $status)
{
	$status = 1 - $status;
	$this->admin_action->changestatus($table , $id , $status);
	redirect('Adminpanel/admin_users');
}

public function deleteuserbyid($table , $id)
{
	$this->admin_action->deleteuserbyid($table , $id);
	redirect('Adminpanel/admin_users');
}

public function edit_admin_user($id)
{
	$userdet_byid = $this->admin_action->getAdminuserById($id);
	$data['userdetails'] = $userdet_byid;
	$this->load->view("admin/edit_admin_user",$data);
}

public function edit_admin_user_action($id)
{
	$admin_users_view = $this->input->post('admin_users_view') == null ? 0 : $this->input->post('admin_users_view');
	$admin_users_edit = $this->input->post('admin_users_edit') == null ? 0 : $this->input->post('admin_users_edit');
	$admin_users_delete = $this->input->post('admin_users_delete') == null ? 0 : $this->input->post('admin_users_delete');
	$admin_users_status = $this->input->post('admin_users_status') == null ? 0 : $this->input->post('admin_users_status');
	$admin_users_add = $this->input->post('admin_users_add') == null ? 0 : $this->input->post('admin_users_add');
	
	$page_admin_users = json_encode(array($admin_users_view,$admin_users_edit,$admin_users_delete,$admin_users_status,$admin_users_add));
	
	$registered_users_view = $this->input->post('registered_users_view') == null ? 0 : $this->input->post('registered_users_view');
	$registered_users_edit = $this->input->post('registered_users_edit') == null ? 0 : $this->input->post('registered_users_edit');
	$registered_users_delete = $this->input->post('registered_users_delete') == null ? 0 : $this->input->post('registered_users_delete');
	$registered_users_status = $this->input->post('registered_users_status') == null ? 0 : $this->input->post('registered_users_status');
	$registered_users_add = $this->input->post('registered_users_add') == null ? 0 : $this->input->post('registered_users_add');
	
	$page_registered_users = json_encode(array($registered_users_view,$registered_users_edit,$registered_users_delete,$registered_users_status,$registered_users_add));
	
	
	$category_view = $this->input->post('category_view') == null ? 0 : $this->input->post('category_view');
	$category_edit = $this->input->post('category_edit') == null ? 0 : $this->input->post('category_edit');
	$category_delete = $this->input->post('category_delete') == null ? 0 : $this->input->post('category_delete');
	$category_status = $this->input->post('category_status') == null ? 0 : $this->input->post('category_status');
	$category_add = $this->input->post('category_add') == null ? 0 : $this->input->post('category_add');
	
	$page_category = json_encode(array($category_view,$category_edit,$category_delete,$category_status,$category_add));
	
	$request_view = $this->input->post('request_view') == null ? 0 : $this->input->post('request_view');
		
	$page_request = json_encode(array($request_view));
	
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$username = $this->input->post('email');
	$password = $this->input->post('password');
	
	$admin_user_det=array(
      'name'=>$name,
      'email'=>$email,
      'phone'=>$phone,
	  'username'=>$username,
	  'page_admin_users'=>$page_admin_users,
	  'page_registered_users'=>$page_registered_users,
	  'page_category'=>$page_category,
	  'page_request'=>$page_request
        );
	if(trim($password) != ''){
        $admin_user_det['password'] = md5($password);
    }
	
	$this->admin_action->update_adminusers($admin_user_det , $id);
	redirect('Adminpanel/admin_users');
	
}

public function changestatususer($table , $id , $status)
{
	$status = 1 - $status;
	$this->admin_action->changestatus($table , $id , $status);
	redirect('Adminpanel/registered_users');
}
public function deletereguserbyid($table , $id)
{
	$this->admin_action->deleteuserbyid($table , $id);
	redirect('Adminpanel/registered_users');
}

public function edit_reg_user($id)
{
	$userdet_byid = $this->admin_action->getReguserById($id);
	$data['reg_userdetails'] = $userdet_byid;
	$this->load->view("admin/edit_reg_user",$data);
}
public function edit_reg_user_action($id)
{
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$username = $this->input->post('email');
	$password = $this->input->post('password');
	
	$reg_user_det=array(
      'name'=>$name,
      'email'=>$email,
      'phone'=>$phone
        );
	if(trim($password) != ''){
        $reg_user_det['password'] = md5($password);
    }
	
	$this->admin_action->update_regusers($reg_user_det , $id);
	redirect('Adminpanel/registered_users');
	
}

public function category()
{
	$category = $this->admin_action->getAllcategory();
	$data['categories'] = $category;
	$this->load->view("admin/category",$data);
}

public function changestatuscat($table , $id , $status)
{
	$status = 1 - $status;
	$this->admin_action->changestatus($table , $id , $status);
	redirect('Adminpanel/category');
}
public function deletecatbyid($table , $id)
{
	$this->admin_action->deletecatbyid($table , $id);
	redirect('Adminpanel/category');
}

public function add_category()
{
$this->load->view("admin/add_category");
}

public function add_category_action()
{
	$category = $this->input->post('category');
	$sub_cat = $this->input->post('sub_cat[]');
	
	
	$categories=array(
      'category'=>$category
        );
	
	
	$this->admin_action->add_category_action($categories , $sub_cat);
	redirect('Adminpanel/category');
	
}

public function edit_category($id)
{
	$cat_byid = $this->admin_action->getCategorybyId($id);
	$data['cat_byid'] = $cat_byid;
	$subcat_byid = $this->admin_action->getsubCategorybyId($id);
	$data['subcats'] = $subcat_byid;
	$this->load->view("admin/edit_category",$data);
}

public function edit_category_action($id)
{
	$category = $this->input->post('category');
	$sub_cat = $this->input->post('sub_cat[]');
	$sub_cat_prev = $this->input->post('sub_cat_prev');
	$subcatprevid = $this->input->post('subcatprevid');
	
	
	$categories=array(
      'category'=>$category
        );
	
	
	$this->admin_action->edit_category_action($categories , $sub_cat , $id , $subcatprevid , $sub_cat_prev);
	redirect('Adminpanel/category');
	
}
public function deletesubcatbyid($table , $id , $catid)
{
	$this->admin_action->deletesubcatbyid($table , $id);
	redirect('Adminpanel/edit_category/'.$catid.'');
}

public function request()
{
	$allrequests['allrequestdet'] = $this->admin_action->getallrequest();
	
	$this->load->view("admin/request",$allrequests);
}

public function requestdetails($id)
{
	$requestdet['requestdet'] = $this->admin_action->getRequestbuId($id);
	/* $productids = json_decode($requestdet->product_id);
		foreach($productids as $productid)
		{
			$companyname = $this->admin_action->getcompanydetbyuserid($userid)->company_name;
			$productname = $this->admin_action->getproductdetbyid($productid)->title;
			
			$requestdet['product_det'] = $companyname.'|'.$productname;
			
		} */
	
	$this->load->view("admin/requestdetails",$requestdet);
}


}

?>