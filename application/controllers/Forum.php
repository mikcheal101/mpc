<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	public $data = array(
		'title' => 'MPC',
		'sub_title' => '',
		'email' => '',
		'myOrders' => array(),
		'plan_login_url' => "",
		'session'=>null,
		'level' => 0,
		'page' => 'user',
		'type' => 'Chefs',
		'description' => 'MPC FORUM',
		'keywords' => 'MPC FORUM, My personal Chef',
	);

	static $POST_MESSAGE 		= 1;
	static $LOAD_MESSAGES		= 2;
	static $SAVE_UPDATE_USER	= 3;
	static $LOAD_MESSAGES_PER	= 4;

	public function __construct () {
		parent::__construct();
		$this->data['session'] = $_SESSION['user'] = isset($_SESSION['user'])?$_SESSION['user']:null;
		$this->data['isUser']  = $this->isUser ();
	}
	
	private function isUser () {
		$valid = $_SESSION['user'];
		if (isset($valid))
			return ((int)$valid->type === 2);
		return false;
	}

	public function index () {
		$this->data['sub_title'] = "Forum Board";
		$this->load->view('user/header', $this->data);
		$this->load->view('forum/forum_board', $this->data);
		$this->load->view("user/footer", $this->data);
	}

	public function boardOld () {
		$this->load->view("user/header", $this->data);
		$this->load->view("forum/chat_page",  $this->data);
		$this->load->view("user/footer", $this->data);
	}
	
	public function addUser () {
		$person = $this->forumModel->saveUser ();
		$_SESSION['user'] = $person;
	}

	public function sample () {echo date ('Y-m-d h:i:s', time ());}
	
	public function action () {
		$act = $this->input->post('action');
		
		switch ($act) {
			case Forum::$LOAD_MESSAGES:
				$var = $this->forumModel->pullMessages();
				echo json_encode (array('chat'=>$var, 'current_time' => date ('Y-m-d h:i:s', time ())));
				break;
			case Forum::$POST_MESSAGE:
				$var = $this->forumModel->sendMessage ();
				echo json_encode (array ('post' => $var));
				break;
			case Forum::$SAVE_UPDATE_USER:
				$_SESSION['user'] = $this->forumModel->saveUser ();
				break;
			case Forum::$LOAD_MESSAGES_PER:

				$var = $this->forumModel->pullPeriodicMessages ();
				echo json_encode (array('chat'=>$var, 'current_time' => date ('Y-m-d h:i:s', time ())));
				break;
			default:
				echo json_encode(array('data'=>'nothing sent'));
				break;
		}
	}

	public function fetchMostCommented ( ) {
		echo json_encode(array('items' => $this->forumModel->fetchMostCommented ()));
	}

	public function fetchLeftCounters ( ) {
		echo json_encode($this->forumModel->fetchLeftCounters ());
	}
	
	public function uploadPix ( ) {
		$this->upload->initialize($this->set_upload_options());
		$files = $_FILES;
		$counter = count ($_FILES['files']['name']);
		
		for ($i=0; $i<$counter; $i++) {
			$_FILES['userfile'] 			= array ();
			$_FILES['userfile']['name']		= $_FILES['files']['name'][$i];
	        $_FILES['userfile']['type']		= $_FILES['files']['type'][$i];
	        $_FILES['userfile']['tmp_name']	= $_FILES['files']['tmp_name'][$i];
	        $_FILES['userfile']['error']	= $_FILES['files']['error'][$i];
	        $_FILES['userfile']['size']		= $_FILES['files']['size'][$i];
	
	        if ($this->upload->do_upload())
	        	$this->forumModel->saveImage ($this->upload->data ());
		}
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

?>
