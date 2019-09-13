<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Userpanel extends CI_Controller {
    

public function __construct(){
 
        parent::__construct();
   $this->load->helper('url');
   $this->load->library('session');
   $this->load->model('user_panel_model');

	if(!$this->session->userdata('logged_in_user')){
			
			redirect('users/login_view', 'refresh');
			 		
		}
 
}	
	
public function index()
{
$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/dashboard.php");
}

public function logout() {
		$this->session->unset_userdata('logged_in_user');
		redirect('users/login_view');
	}

public function account()
{
$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/account",$data);
}

public function update_user()
{
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$username = $this->input->post('email');
	$password = $this->input->post('password');
	
	$config['upload_path']   = './upload/userupload/profilepic'; 
    $config['allowed_types'] = 'gif|jpg|png';
	$file_name = time().'_'.str_replace(" ","_",$_FILES["prof_img"]['name']);
	$config['file_name'] = $file_name;	
    $this->load->library('upload', $config);
	$this->upload->do_upload('prof_img');
	 

	$update_user_det=array(
      'name'=>$name,
      'email'=>$email,
      'phone'=>$phone
	  
        );
	if(trim($password) != ''){
        $update_user_det['password'] = md5($password);
    }
	if(trim($_FILES["prof_img"]['name']) != ''){
        $update_user_det['prof_pic']=$file_name;
    }
	
	$this->user_panel_model->update_user($update_user_det , $this->session->logged_in_user->id);
	redirect('userpanel/account');
	
}

public function companyprofile()
{
	
$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$data['company_data'] = $this->user_panel_model->getcompanydetails($this->session->logged_in_user->id);

$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/companyprofile");
}

public function getsubcategory()
{
	$catid = $this->input->post('cat_id');
	$subcategories = $this->user_panel_model->getallsubcategoriesbyid($catid);
	foreach($subcategories as $subcategory)
	{
		echo '<option value="'.$subcategory->id.'">'.$subcategory->sub_category.'</option>';
	}
}

public function update_company_prof()
{
	$name = $this->input->post('name');
	$address = $this->input->post('address');
	$companydescription = $this->input->post('companydescription');
	$short_description = $this->input->post('short_description');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	
	$config['upload_path']   = './upload/userupload/companylogo'; 
    $config['allowed_types'] = 'gif|jpg|png';
	$file_name = time().'_'.str_replace(" ","_",$_FILES["company_logo"]['name']);
	$config['file_name'] = $file_name;	
    $this->load->library('upload', $config);
	$this->upload->do_upload('company_logo');
	 

	$update_user_det=array(
      'user_id'=>$this->session->logged_in_user->id,
	  'company_name'=>$name,
	  'address'=>$address,
	  'short_description' => $short_description,
	  'description'=>$companydescription,
      'email'=>$email,
      'phone'=>$phone
	  
        );
	
	if(trim($_FILES["company_logo"]['name']) != ''){
        $update_user_det['company_logo']=$file_name;
    }
	
	if($this->user_panel_model->company_prof_exist($this->session->logged_in_user->id))
	{
		$this->user_panel_model->update_company_prof($update_user_det , $this->session->logged_in_user->id);
	}
	else
	{
		$this->user_panel_model->insert_company_prof($update_user_det);
	}
	
	redirect('userpanel/companyprofile');
	
}

public function addproduct()
{

$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$data['all_categories'] = $this->user_panel_model->getallcategories();
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/addproduct",$data);
}

public function addproduct_action()
{
	$category = $this->input->post('category');
	$sub_category = $this->input->post('sub_category');
	$description = $this->input->post('productdescription');
	$title = $this->input->post('title');
	
	$config['upload_path']   = './upload/userupload/productpic'; 
    $config['allowed_types'] = 'gif|jpg|png';
	$file_name = time().'_'.str_replace(" ","_",$_FILES["productpic"]['name']);
	$config['file_name'] = $file_name;	
    $this->load->library('upload', $config);
	$this->upload->do_upload('productpic');
	 

	$data=array(
      'user_id'=>$this->session->logged_in_user->id,
	  'category'=>$category,
	  'sub_category'=>$sub_category,
	  'description'=>$description,
	  'title'=>$title,
	  'status'=>1
	  
        );
	
	if(trim($_FILES["productpic"]['name']) != ''){
        $data['product_pic']=$file_name;
    }
	
	$this->user_panel_model->insert_product($data);
	
	redirect('userpanel/manageproduct');
	
}

public function manageproduct()
{
$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$data['all_products_byuser'] = $this->user_panel_model->all_products_byuser($this->session->logged_in_user->id);
$products = $data['all_products_byuser'];
$allproductdet = array();
$allproductdets = array();
  foreach($products as $product)
  {
	  $productid = $product->id;
	  $productcat = $this->user_panel_model->productcatbyid($product->category)->category;
	  $productsubcat = $this->user_panel_model->productsubcatbyid($product->sub_category)->sub_category;
	  $allproductdet['id'] = $productid;
	  $allproductdet['category'] = $productcat;
	  $allproductdet['sub_category'] = $productsubcat;
	  $allproductdet['status'] = $product->status;
	  $allproductdets[] = $allproductdet;
  }
  
$data['products_byuser'] = $allproductdets;
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/manageproduct",$data);
}

public function changestatus($table , $id , $status)
{
	$status = 1 - $status;
	$this->user_panel_model->changestatus($table , $id , $status);
	redirect('userpanel/manageproduct');
}

public function deletebyid($table , $id)
{
	$this->user_panel_model->deletebyid($table , $id);
	redirect('userpanel/manageproduct');
}

public function editproduct($productid)
{

$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$data['all_categories'] = $this->user_panel_model->getallcategories();
$data['product_det'] = $this->user_panel_model->getproductbyid($productid);
$data['all_subcategories'] = $this->user_panel_model->getallsubcategoriesbyid($data['product_det']->category);
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/editproduct",$data);
}

public function editproduct_action()
{
	$product_id = $this->input->post('product_id');
	$category = $this->input->post('category');
	$sub_category = $this->input->post('sub_category');
	$description = $this->input->post('productdescription');
	$title = $this->input->post('title');
	
	$config['upload_path']   = './upload/userupload/productpic'; 
    $config['allowed_types'] = 'gif|jpg|png';
	$file_name = time().'_'.str_replace(" ","_",$_FILES["productpic"]['name']);
	$config['file_name'] = $file_name;	
    $this->load->library('upload', $config);
	$this->upload->do_upload('productpic');
	 

	$data=array(
      'user_id'=>$this->session->logged_in_user->id,
	  'category'=>$category,
	  'sub_category'=>$sub_category,
	  'description'=>$description,
	  'title'=>$title,
	  'status'=>1
	  
        );
	
	if(trim($_FILES["productpic"]['name']) != ''){
        $data['product_pic']=$file_name;
    }
	
	$this->user_panel_model->update_product($data,$product_id);
	
	redirect('userpanel/manageproduct');
	
}

public function request()
{
$data['user_primary_data'] = $this->user_panel_model->getuserdetails($this->session->logged_in_user->id);
$data['all_categories'] = $this->user_panel_model->getallcategories();
$this->load->view('userpanel/header.php',$data);
$this->load->view("userpanel/request",$data);
}

public function getcompanybysubcat()
{
	$subcat = $this->input->post('subcat');
	$products = $this->user_panel_model->getproductbysubcat($subcat);
	foreach($products as $product)
	{
		$product_id[] = $product->id;
		echo '<p>'.$product->company_name.'<a href="../company/'.$product->user_id.'" target="_blank" class="button_det">Details</a></p>';
	}
	$product_ids = json_encode($product_id);
	echo "<input type='hidden' id='product_ids' name='product_ids' value='".$product_ids."'>";
}

public function send_request()
{
	$user_id = $this->input->post('user_id');
	$category = $this->input->post('category');
	$sub_category = $this->input->post('sub_category');
	$product_ids = $this->input->post('product_ids');
	
	$requestdet = array(
	'user_id' => $user_id,
	'category' => $category,
	'sub_category' => $sub_category,
	'product_id' => $product_ids
	);
	
	if($this->user_panel_model->send_request($requestdet))
	{
		$this->session->set_flashdata('request_success', 'Request Send Successfully');
		redirect('userpanel/request');
	}
	else
	{
		$this->session->set_flashdata('request_success', 'Request Not Send Try Again');
		redirect('userpanel/request');
	}
}




}