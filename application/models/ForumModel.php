<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumModel extends CI_Model {

	public static $FORUM_TABLE = "forum";
	public static $USERS_TABLE = "users";

	public function __construct () {
		parent::__construct();
	}

	public function pullMessages () {
		$this->db
			->select ("ft.id as id, ft.author, ft.text, ft.ts, u.id AS uid, u.image_url, u.username, u.fullname")
			->from ("forum AS ft, users AS u")			
			->where ("ft.author = u.id")
			->order_by ("ft.ts DESC");
		$x = $this->db->get ()->result ();
	
		foreach($x as $y) {
			$y->image_url 	= ($y->image_url === null) ? "http://placehold.it/300x300": $y->image_url;
			$y->fullname 	= ($y->fullname === null) ? $y->username : $y->fullname;
			$y->text		= base64_decode($y->text);
			
			$y->extras 		= $this->db->get_where ('forum_extras', array ('forum_id' => $y->id))->result ();
		}

		return $x;
	}
	
	public function pullPeriodicMessages () {
		
		$time = $this->input->post ('timer');
		$this->db
			->select ("ft.id as id, ft.author, ft.text, ft.ts, u.id AS uid, u.image_url, u.username, u.fullname")
			->from ("forum AS ft, users AS u")
			->where ("ft.author = u.id AND ft.ts >= '{$time}'")
			->order_by ("ft.ts DESC");
		
		$x = $this->db->get ()->result ();
		#echo $this->db->last_query (); return;
		foreach($x as $y) {
			$y->image_url 	= ($y->image_url === null) ? "http://placehold.it/300x300": $y->image_url;
			$y->fullname 	= ($y->fullname === null) ? $y->username : $y->fullname;
			$y->text		= base64_decode($y->text);
			$y->extras 		= $this->db->get_where ('forum_extras', array ('forum_id' => $y->id))->result ();
		}
		return $x;
	}

	public function sendMessage () {
		# insert message to db
		$user = $_SESSION['user'];
		$this->db->insert (ForumModel::$FORUM_TABLE, array ('author' => $user->id, 'text' => base64_encode ($_POST['message'])));
		return $this->db->insert_id ();
	}

	public function editMessage () {}

	public function deleteMessage () {}

	public function barnUser () {}

	public function unbarUser () {

	}
	
	public function saveUser ( ) {
		$user = new stdClass ();
		$user->email 		= $this->input->post('email');
		$user->password		= md5($this->input->post('id'));
		$user->username		= $this->input->post('email');
		$user->type			= 2;
		$user->image_url	= $this->input->post('photo');
		$user->activated	= 1;
		$user->fullname		= $this->input->post('name');
		
		$valid = $this->db->get_where (ForumModel::$USERS_TABLE, array ('email' => $user->email))->row ();
		
		if ($valid === null) {
			$this->db->insert (ForumModel::$USERS_TABLE, $user);
		} else {
			#var_dump($valid->id); return;
			$this->db->update (ForumModel::$USERS_TABLE, array ('last_activity' => date('Y-m-d H:i:s'), 'image_url' => $user->image_url), array ('id' => $valid->id));
		}
		return $this->db->get_where (ForumModel::$USERS_TABLE, array ('email'=> $user->email))->row ();
	}

	public function fetchLeftCounters ( ) {
		if (isset ($_SESSION['user'])) {
			$session = $_SESSION['user'];
			$sql = "SELECT
			(SELECT count(*) FROM forum WHERE author = {$session->id}) AS posts,
			(SELECT COUNT(*) FROM forum_follow WHERE follower = {$session->id}) AS following,
			(SELECT COUNT(*) FROM forum_follow WHERE followed = {$session->id}) AS followers";
			return $this->db->query ($sql)->row();
		} return;
	}

	public function fetchMostCommented ( ) {
		$this->db
			->select ("COUNT(*) AS counted,
		    (SELECT u.image_url FROM users AS u WHERE u.id = f.author) AS image,
		    (SELECT u.username FROM users AS u WHERE u.id = f.author) AS username,
		    (SELECT u.fullname FROM users AS u WHERE u.id = f.author) AS fullname,
		    (SELECT u.id FROM users AS u WHERE u.id = f.author) AS u_id")
			->from ("forum AS f")
			->group_by ("f.author")
			->order_by ("counted", "DESC")
			->limit (10);
		$data =  $this->db->get ()->result ();
		foreach ($data as $d) {
			$d->image = ($d->image === null) ? "http://placehold.it/300x300" : $d->image;
			$d->fullname = ($d->fullname === null) ? $d->username : $d->fullname;
		}
		return $data;
	}
	
	public function saveImage ($array) {
		$this->db->insert ('forum_extras', array ('forum_id' => $this->input->post ('forum'), 'url' => $array['file_name'], 'item_type' => 1));
		echo $this->db->last_query ();
	}
	
	public function saveVideo ($array) {
		$this->db->insert ('forum_extras', array ('forum_id' => $this->input->post ('forum'), 'url' => $array['file_name'], 'item_type' => 2));
	}
	
	public function saveAudio ($array) {
		$this->db->insert ('forum_extras', array ('forum_id' => $this->input->post ('forum'), 'url' => $array['file_name'], 'item_type' => 3));
	}
}
