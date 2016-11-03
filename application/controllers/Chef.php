<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chef extends CI_Controller {
	
	private $data = array(
		'title' => 'MPC',
		'sub_title' => '', 
		'error'=>'', 
		'page' => 'chef', 
		'type' => 'Chefs', 
		'description' => 'chef meals', 
		'keywords' => 'chef, meals',
		);
	
	public function __construct () {
		parent::__construct();
		$this->data['user'] = isset($_SESSION['user'])?$this->users_model->getMe():array();
	}
	
	public function checkUsername () {
		// go through the database and get the data
		$username = trim ($this->input->post ('param'));
		$username = str_replace(' ', '_', $username);
		echo json_encode(array ('response'=> $this->users_model->checkUsername($username)));
	}
	
	public function checkEmail () {
		$email = trim ($this->input->post('param'));
		$email = str_replace(' ', '_', $email);
		echo json_encode(array ('response'=> $this->users_model->checkEmail($email)));
	}
	
	public function checkTel () {
		$tel = trim ($this->input->post('param'));
		$tel = str_replace(' ', '_', $tel);
		echo json_encode(array ('response'=> $this->users_model->checkTel($tel)));
	}
	
	public function authenticate () {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$username = str_replace(' ', '_', $username);		
		$password = str_replace(' ', '_', $password);
		$password = md5($password);
		
		
		$result = $this->users_model->authenticate($username, $password);
		if ($result['result'] === TRUE) {
			# create session and register the user
			$_SESSION['user'] = $result['data'];
		}
		echo json_encode($result);
	}
	
	public function ajaxSaveChef () {
		$this->upload->initialize($this->set_upload_options ());
		
		$_FILES['userfile'] 			= array ();
		$_FILES['userfile']['name']		= $_FILES['img']['name']['val'];
		$_FILES['userfile']['type']		= $_FILES['img']['type']['val'];
		$_FILES['userfile']['tmp_name']	= $_FILES['img']['tmp_name']['val'];
		$_FILES['userfile']['error']	= $_FILES['img']['error']['val'];
		$_FILES['userfile']['size']		= $_FILES['img']['size']['val'];
		$activation_code = $this->encryption->encrypt (time () .";". $_POST['fullname']['val'] .";". $_POST['email']['val']);
		
		if ($this->upload->do_upload ()) {
			$this->sendRegistrationEmail ($activation_code, $_POST['email']['val']);
			$this->users_model->ajaxSaveChef ($this->upload->data ());
		} 
	}
	
	private function set_upload_options ( ) {   
	    //upload an image options
	    $config = array();	    
	    $config['upload_path']          = 'images/chef';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['file_name']			= time();
		$config['encrypt_name']			= TRUE;
		$config['remove_spaces']		= TRUE;
	    return $config;
	}
	
	public function myProfile () {
		$this->data['level'] = 0;
		if($this->form_validation->run() && $this->upload->do_upload('passport')) {
			$this->meals_model->saveMeal($this->upload->data());
			redirect('chef/myProfile');
		} else {
			$this->data['upload_error'] = $this->upload->display_errors();
			$this->data['session'] = $_SESSION['user'];
			
			$this->data['sub_title'] = "My Profile";
			$this->loadPage('chef/myProfile');
		}
			
	}
	
	public function meals () {
		$this->data['location'] = 1;
		$this->data['meals'] = $this->meals_model->fetchAllMyMeal();
		$this->form_validation->set_rules('mealname', 'Meal Name', 'required');
		$this->form_validation->set_rules('ingridients', 'Ingrideients', 'required');
		$this->form_validation->set_rules('comment', 'Meal Comments', 'required');
		$this->form_validation->set_rules('meal_type', 'Meal Type', 'numeric|trim|required');
		$this->form_validation->set_rules('servings_price', 'Serving Price', 'required|trim|numeric');
		
		if($this->form_validation->run() && $this->upload->do_upload('passport')) {
			$this->meals_model->saveMeal($this->upload->data());
			redirect('chef/meals');
		} else {
			$this->data['sub_title'] = "My MPC Meals";
			$this->data['upload_error'] = $this->upload->display_errors();
			$this->loadPage('chef/meals');
		}
	}
	
	public function orders () {
		$this->data['location'] = 2;
		$this->data['orders'] = array();
		$this->data['sub_title'] = "My MPC Orders";
		$this->loadPage('chef/orders');
	}
	
	public function sales() {
		$this->data['location'] = 3;
		$this->data['sales'] 	= array();
		$this->data['sub_title'] = "My MPC Sales";
		$this->loadPage('chef/sales');
	}
	
	public function getMeal($id) {
		// fetch the meal from the database
		$result = $this->meals_model->fetchMeal($id);
		echo json_encode($result);
	}
	
	public function removeMeal($id) {
		$this->meals_model->deleteMeal($id);
	}
	
	public function logout($controller='', $function='') {
		unset($_SESSION['user']);
		
		if (strlen($controller) > 0 && strlen($function) > 0) redirect($controller."/".$function);	
		else redirect('user/index');
	}
	
	private function loadPage ($url) {
		$this->load->view ('chef/head', $this->data);
		$this->load->view('chef/header', $this->data);
		$this->load->view($url, $this->data);
		$this->load->view('chef/footer', $this->data);
	}
	
	public function myMenu () {
		$this->data['location'] = 3;
		$this->data['meals'] = $this->meals_model->fetchAllMyMeal();
		$this->data['sub_title'] = "My MPC Menu";
		$this->loadPage('chef/myMenu');
	}
    
    public function getMenu () {
        echo json_encode($this->users_model->fetchChefMenu());
    }
	
	private function sendRegistrationEmail ($code = '', $email = '') : boolean {
		if (strlen($code) > 1) {
			$this->data['code']	= urlencode ($code);
			
			$this->email->set_mailtype ('html');
			$this->email->from ('customercare@mypersonalchef.com.ng', 'Mypersonalchef.com.ng Admin');
			$this->email->to ($email);
			$this->email->bcc (array ('customercare@mypersonalchef.com.ng'));
			$this->email->subject ('welcome to mypersonalchef.com.ng');
			$this->email->message ($this->load->view ('email/chefRegistrationEmail', $this->data, TRUE));
			return ($this->email->send ());
		} 
		return FALSE;
	}
	
	private function sendVerificationEmail ($email = '') {
		if (strlen($email) > 1) {
			$this->data['email']	= $email;
			
			$this->email->set_mailtype ('html');
			$this->email->from ('customercare@mypersonalchef.com.ng', 'Mypersonalchef.com.ng Admin');
			$this->email->to ($email);
			$this->email->bcc (array ('customercare@mypersonalchef.com.ng'));
			$this->email->subject ('Mypersonalchef.com.ng Verification');
			$this->email->message ($this->load->view ('email/chefVerificationEmail', $this->data, TRUE));
			return ($this->email->send ());		
		} 
		return FALSE;
	}	
	
	public function verifyChef () {
		if ($this->input->get ('code') === null) return;
		
		# confirm from database
		$row = $this->users_model->confirm_verification_code ();
		if ($row) {
			$email = $row->email;
			$verification = $this->sendVerificationEmail ($email);
			$this->data['confirmation_tile'] = ($verification) ? "Verification SuccessFul!" : "Verification Error";
			$this->data['confirmation_msg']  = ($verification) ? "<p>Your email address [{$email}] has been successfull verified.</p>" : "An error occured while verifying your email address [{$email}].";
			
			$this->data['sub_title'] = "Verification Page";
			$this->load->view('header', $this->data);
			$this->load->view('chef/verificationPage', $this->data);
		} else show_404();
	}
	
	public function loginChef () {
		if (isset($_SESSION['user'])) {
			redirect('/chef/myProfile', 'refresh');
		} else $this->data['session'] = null;
		
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$username = str_replace(' ', '_', $username);		
			$password = str_replace(' ', '_', $password);
			$password = md5($password);
			
			
			$result = $this->users_model->authenticate($username, $password);
			if ($result['result'] === TRUE) {
				# create session and register the user
				$_SESSION['user'] = $result['data'];
				redirect('/chef/myProfile', 'refresh');
			} else {
				$this->data['error'] = "Wrong Username / Password";
			}
		}
		
		$this->data['sub_title'] = "Authentication";
		$this->load->view('header', $this->data); 
		$this->load->view('chef/loginPage', $this->data);
	}
	
	
	
	private function writeFile ($image) {
		
		$image_string = base64_decode($image->data);
			 
		#	display encoded_string size
		$fopen_path = FCPATH.$image->url; 
		
		$open = fopen($fopen_path, "wb+");
			
		if ($open) {
			if (fwrite($open, $image_string)) return TRUE;
			else return FALSE;
		} else return FALSE; 
		
	}
}
?>