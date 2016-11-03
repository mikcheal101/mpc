<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Model extends CI_Model {
	
	private $message_limit = 5;
	
	public function __construct () {
		parent::__construct ();
	}
	
	public function auth () {
		# user details are sent 
		
		# query db for user 
		
		# if user doesnt exist save to db and send back details
		
		# else update ts and user details such as profile image and name 
	}
	
	public function sendImage (array $data) : array {
		$this->db->trans_start ();	
			$message = array ();
			$message['author'] = $this->getUser ($this->input->post ('email'));
			$this->db->insert ('forum', $message);
			$extras = array ();
			
			$extras['forum_id'] = $this->db->insert_id ();
			$extras['url']	= $data['file_name'];
			$extras['item_type'] = 1;
			
			$this->db->insert ('forum_extras', $extras);
		$this->db->trans_complete ();
		$result = array ($this->db->trans_status ());
		return $result;
	}
	
	public function loadMessages () {
		# load all the messsages from the db order by ts
		
		$this->db
			->select ("ft.id as id, ft.author, ft.text, ft.ts, u.id AS uid, u.image_url, u.username, u.fullname")
			->from ("forum AS ft, users AS u")			
			->where ("ft.author = u.id")
			->order_by ("ft.id DESC")
			->limit ($this->message_limit);
		$x = $this->db->get ()->result ();
		foreach($x as $y) {
			$y->image_url 	= ($y->image_url === null) ? "http://placehold.it/300x300": $y->image_url;
			$y->fullname 	= ($y->fullname === null) ? $y->username : $y->fullname;
			$y->text		= base64_decode($y->text);
			$y->extras 		= $this->db->get_where ('forum_extras', array ('forum_id' => $y->id))->result ();
			foreach ($y->extras as $e) {
				$e->url = base_url ("images/forum/{$e->url}");
			}
		}
		return $x;
	}
	
	public function loadFutureMessages () {
		# load all the messsages from the db order by ts
		$last_id = $_POST['last_id'];
		$this->db
			->select ("ft.id as id, ft.author, ft.text, ft.ts, u.id AS uid, u.image_url, u.username, u.fullname")
			->from ("forum AS ft, users AS u")			
			->where ("ft.author = u.id AND ft.id > '{$last_id}'")
			->order_by ("ft.id DESC")
			->limit ($this->message_limit);
		$x = $this->db->get ()->result ();
		
		foreach($x as $y) {
			$y->image_url 	= ($y->image_url === null) ? "http://placehold.it/300x300": $y->image_url;
			$y->fullname 	= ($y->fullname === null) ? $y->username : $y->fullname;
			$y->text		= base64_decode($y->text);
			$y->extras 		= $this->db->get_where ('forum_extras', array ('forum_id' => $y->id))->result ();
			foreach ($y->extras as $e) {
				$e->url = base_url ("images/forum/{$e->url}");
			}
		}
		return $x;
	}
	
	public function loadPastMessages () {
		# load all the messsages from the db order by ts
		$last_id = $this->input->post ('last_id');
		$this->db
			->select ("ft.id as id, ft.author, ft.text, ft.ts, u.id AS uid, u.image_url, u.username, u.fullname")
			->from ("forum AS ft, users AS u")			
			->where ("ft.author = u.id AND ft.id < '{$last_id}'")
			->order_by ("ft.id DESC")
			->limit ($this->message_limit);
		$x = $this->db->get ()->result ();
		foreach($x as $y) {
			$y->image_url 	= ($y->image_url === null) ? "http://placehold.it/300x300": $y->image_url;
			$y->fullname 	= ($y->fullname === null) ? $y->username : $y->fullname;
			$y->text		= base64_decode($y->text);
			$y->extras 		= $this->db->get_where ('forum_extras', array ('forum_id' => $y->id))->result ();
			foreach ($y->extras as $e) {
				$e->url = base_url ("images/forum/{$e->url}");
			}
		}
		return ($x) ? $x : [];
	}
	
	public function sendMessage () {
		# post message to db 
		$post = $_POST;
		$message = array ();
		$message['text'] = $post['text'] ?? '';
		$message['text'] = base64_encode ($message['text']);
		
		$message['author'] = $this->getUser($post['email'] ?? '');
		
		return $this->saveMessage($message);
	}

	public function newUser () {
		
		$post = $_POST['user'];
		if (count ($_POST) < 1) return;
		$user = $this->getUser ($post['email']);
		if (!$user) {
			$save = array ();
			$save['email'] = $post['email'];
			$save['password'] = md5 ($post['id']);
			$save['username'] = $post['email'];
			$save['type'] = USER;
			$save['image_url'] = $post['picture']['data']['url'];
			$save['activated'] = 1;
			$save['fullname'] = $post['name'];
			$this->db->insert ('users', $save);
			return array ('save');
		} else {
			$save = array ();
			$save['image_url'] = $post['picture']['data']['url'];
			$save['fullname'] = $post['name'];
			$this->db->update ('users', $save, array (
				'email' => $post['email'],
			));
			return array ('update');
		}
	}
	
	private function saveMessage (array $message) {
		$sql = "INSERT INTO forum (text, author) VALUES ('{$message['text']}', '{$message['author']}')";
		
		$this->db->query ($sql);
		$result = $this->db->insert_id ();
		return $sql;
	}
	
	private function getUser ($email='') {
		if (strlen ($email) > 0) {
			$data = $this->db->get_where ('users', array ('email'=>$email))->row ();
			return isset ($data) ? $data->id : false;
		}
		return false;
	}
	
}