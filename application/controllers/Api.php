<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	public function __construct () {
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}
	 
		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
	 
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
				header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			exit(0);
		}
		parent::__construct ();
	}
	
	public function auth () {
		$this->result (
			$this->api_Model->auth (),
			array (
				'User Found!', 
				'User Not Found!'
			)
		);
	}
	
	public function sendMessage () {
		$data = $this->api_Model->sendMessage ();
		#$data = $_POST;
		
		$this->result (
			$data,
			array (
				'Message Sent Successfully!',
				'An error occured while Sending message'
			)
		);
	}
	
	public function test () {
		$postdata = file_get_contents("php://input");
		$this->result (['postdata'=> $postdata, 'post'=>$_POST, 'get'=>$_GET], []);
	}
	
	public function newUser () {
		
		$this->result (
			$this->api_Model->newUser (),
			array (
				'User Created / Exists!',
				'An error occured While Creating User!'
			)
		);
	}
	
	public function loadMessages () {
		$this->result (
			$this->api_Model->loadMessages (),
			array (
				'Messages Loaded!',
				'Error Loading Messages!',
			)
		);
	}
	
	public function loadPastMessages () {
		$this->result (
			$this->api_Model->loadPastMessages (),
			array (
				'Messages Loaded!',
				'Error Loading Messages!',
			)
		);
	}
	
	public function loadFutureMessages () {
		$this->result (
			$this->api_Model->loadFutureMessages (),
			array (
				'Messages Loaded!',
				'Error Loading Messages!',
			)
		);
	}
	
	public function sendImage () {
		$this->upload->initialize($this->set_upload_options());
		$result = array ();
		if ($this->upload->do_upload ('file')) {
			$result = $this->api_Model->sendImage ($this->upload->data ());
		}
		$this->result(
			$_FILES,
			array (
				'Image Sent!',
				'Error Sending Image!'
			)
		);	
	}
	
	private function result ($data, array $msg) {
		if (count ($msg) === 0) {
			$msg[0] = 'Action Performed!';
			$msg[1]	= 'An Error Occured While Performing Action!';
		}
		
		$json = json_encode (
			array (
				'status' => ($data) ? 200 : 400,
				'message'=> ($data) ? $msg[0] : $msg[1],
				'object' => $data,
				'time'	=> time (),
			), JSON_NUMERIC_CHECK
		);
			
		$this->output->set_header ('Access-Control-Allow-Origin: *');
		$this->output->set_header ('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
		$this->output->set_header ('Access-Control-Allow-Headers: content-type');
		$this->output->set_content_type ('application/json');
		$this->output->set_output ($json);
	}
	
	private function set_upload_options ( ) {   
	    //upload an image options
	    $config = array();	    
	    $config['upload_path']          = 'images/forum';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['file_name']			= time();
		$config['encrypt_name']			= TRUE;
		$config['remove_spaces']		= TRUE;
	    return $config;
	}
}